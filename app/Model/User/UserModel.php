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