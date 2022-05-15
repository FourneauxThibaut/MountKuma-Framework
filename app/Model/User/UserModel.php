<?php

require($_SERVER['DOCUMENT_ROOT'] . '/src/Utility/Model.php');

class UserModel extends Model
{
    public function get_all_users(){
        return $this->get('*', 'user');
    }

    public function get_user_by_username($username){
        return $this->get('*', 'user', 'name', $username);
    }

    public function create_user($data){
        return $this->store('user', $data);
    }
}

$sql = "CREATE TABLE user
    (
        id INT PRIMARY KEY NOT NULL,
        name VARCHAR(255) NOT NULL UNIQUE,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        access VARCHAR(255) NOT NULL DEFAULT 'guest',
        creation_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    )";