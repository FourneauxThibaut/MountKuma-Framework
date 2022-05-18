<?php

require($_SERVER['DOCUMENT_ROOT'] . '/src/Utility/Controller.php');

class UserController extends Controller
{
    public $model;
    public $controller = 'User';

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct()
    {        
        $this->model = new UserModel($this->controller);
    }

//      ┌────────┐
//      │  LIST  │
//      └────────┘
    public function list()
    {
        $user = $this->model->get('*', 'user');

        if (! empty($user)) {
            $data = [
                'users' => $user,
            ];
    
            $head = [ 'title' => 'list of users' ];
    
            return $this->view('user.user_list', $head, $data);
        }
    }
        

//      ┌───────────┐
//      │  PROFILE  │
//      └───────────┘
    public function profile($id = "null")
    {
        $user = $this->model->get('*', 'user', 'id', $id);

        if (! empty($user)) {
            $data = [
                'user' => [
                    'id' => $user[0]['id'],
                    'name' => $user[0]['name'],
                    'email' => $user[0]['email'],
                    'access' => $user[0]['access'],
                    'creation_date' => $user[0]['creation_date']
                ]
            ];
    
            $head = [ 'title' => 'profile of '. $user[0]['name'] ];
    
            return $this->view('user.profile', $head, $data);
        }
        else {
            $data = [];
            $head = [ 'title' => 'profile not found' ];
    
            return $this->view('error.profile_not_found', $head, $data);
        }        
    }

//      ┌────────┐
//      │  EDIT  │
//      └────────┘
    public function edit($id = "null")
    {
        $user = $this->model->get('*', 'user', 'id', $id);

        if (! empty($user)) {
            $data = [
                'user' => [
                    'id' => $user[0]['id'],
                    'name' => $user[0]['name'],
                    'email' => $user[0]['email'],
                    'access' => $user[0]['access'],
                    'creation_date' => $user[0]['creation_date']
                ]
            ];
    
            $head = [ 'title' => 'profile of '. $user[0]['name'] ];
    
            return $this->view('user.edit', $head, $data);
        }
        else {
            $data = [];
            $head = [ 'title' => 'profile not found' ];
    
            return $this->view('error.profile_not_found', $head, $data);
        }  
    }

//      ┌──────────┐
//      │  UPDATE  │
//      └──────────┘
    public function update($id = "null")
    {
        $this->sanitization();
        $user = $this->model->get('*', 'user', 'id', $id);

        if (! empty($_POST['old-password'])){
            if (password_verify($_POST['old-password'], $user[0]['password'])) {
                if ($_POST['password'] == $_POST['password-confirm']) {

                    $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                }
                else {
                    $this->post['password'] = false;
                    $_SESSION['error-password'] = 'The passwords do not match';
                }
            }
            else {
                $this->post['password'] = false;
                $_SESSION['error-password'] = 'The old password is incorrect';
            }
        }
        if (! empty($_POST['password']) && ! empty($_POST['password-confirm'])) {
            if (empty($_POST['old-password'])){
                $_SESSION['error-password'] = 'You must enter your old password for verification';
                header('Location: /');
            }
        }

        if (! empty($_POST['access'])){
            $data['access'] = $_POST['access'];
        }
        if (! empty($_POST['username'])){
            $data['name'] = $_POST['username'];
        }
        if (! empty($_POST['email'])){
            $data['email'] = $_POST['email'];
        }

        $this->model->update(
            'user',
            $data,
            [ 'id'=>$id ]
        );

        header('Location: /user/'.$id);
    }

//      ┌──────────┐
//      │  DELETE  │
//      └──────────┘
public function delete($id = "null")
{
    $this->model->delete('user', ['id' => $id]);
    header('Location: /');
}

//      ┌─────────┐
//      │  LOGIN  │
//      └─────────┘
    public function login()
    {
        $data = [
            
        ];
        $head = [ 'title' => 'login' ];

        return $this->view('user.login', $head, $data);
    }

//      ┌───────────┐
//      │  SIGN_UP  │
//      └───────────┘
    public function sign_up()
    {
        $data = [
            
        ];
        $head = [ 'title' => 'login' ];

        return $this->view('user.register', $head, $data);
    }

//      ┌───────────┐
//      │  CONNECT  │
//      └───────────┘
    public function connect()
    {
        $this->sanitization();
        unset($_SESSION['error-email']);

        if (! empty($_POST['username'])) {
            $user = $this->model->get_user_by_username($_POST['username']);
        }

        if($user) {
            if (password_verify($_POST['password'], $user[0]['password'])) {
                
                $this->connect_user($_POST['username']);
                header('Location: /');
            }
            else {
                $data = [
                    'error' => 'Wrong password'
                ];
                $head = [ 'title' => 'login' ];

                return $this->view('user.login', $head, $data);
            }
        }
        else {
            $data = [
                'error' => 'User not found'
            ];
            $head = [ 'title' => 'login' ];

            return $this->view('user.login', $head, $data);
        }

        header("Location: /");
    }

//      ┌──────────────┐
//      │  DISCONNECT  │
//      └──────────────┘
    public function disconnect()
    {
        session_destroy();
        header('Location: /');
    }

//      ┌──────────────────────────────┐
//      │  CONNECT_AFTER_REGISTRATION  │
//      └──────────────────────────────┘
    public function connect_user($username)
    {
        $user = $this->model->get_user_by_username($username);
        $auth = [
            'id' => $user[0]['id'],
            'name' => $user[0]['name'],
            'email' => $user[0]['email'],
            'access' => $user[0]['access'],
        ];
        $_SESSION['auth'] = $auth;
    }

//      ┌────────────┐
//      │  REGISTER  │
//      └────────────┘
    public function register()
    {
        $this->sanitization();

        if ( $this->post['username'] == false || 
            $this->post['email'] == false || 
            $this->post['password'] == false) 
        {

            $data = [];
            $head = [ 'title' => 'register' ];
            return $this->view('user.register', $head, $data);
        }
        else{

            if ($_POST['password'] == $_POST['password-confirmation']) {
                $data = [
                    'name' => $this->post['username'],
                    'email' => $this->post['email'],
                    'password' => $this->post['password']
                ];
                $this->model->create_user($data);
                $this->connect_user($data['name']);
                header('Location: /');
            }
            else {
                
                $_SESSION['error-password'] = 'Password must be filled';
                
                $data = [];
                $head = [ 'title' => 'login' ];
                return $this->view('user.register', $head, $data);
            }
        }
    }

//      ┌────────────────┐
//      │  SANITIZATION  │
//      └────────────────┘
    public function sanitization()
    {
        // Sanitize username
        if (! empty($_POST['username'])) {
            if (preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
                $this->post['username'] = $_POST['username'];
            }
            else {
                $this->post['username'] = false;
                $_SESSION['error-username'] = 'Username must be alphanumeric';
            }
        }
        else {
            $this->post['username'] = false;
            $_SESSION['error-username'] = 'Username must be filled';
        }
        
        // Sanitize email
        if (! empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $this->post['email'] = $_POST['email'];
            }
            else {
                $this->post['email'] = false;
                $_SESSION['error-email'] = 'Email must be valid';
            }
        }
        else {
            $this->post['email'] = false;
            $_SESSION['error-email'] = 'Email must be filled';
        }
        
        // Sanitize password
        if (! empty($_POST['password'])) {
            $this->post['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        else {
            $this->post['password'] = false;
            $_SESSION['error-password'] = 'Password must be filled';
        }

        foreach ($this->post as $key => $value) {
            
            $value = trim($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);

            $this->post[$key] = $value;
        }
    }
}