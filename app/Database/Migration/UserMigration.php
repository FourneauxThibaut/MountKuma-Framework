<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/Database/Migration.php');

Class UserMigration extends Migration
{
    public $table = 'users';
    public $sql = '';

    public function __construct()
    {
        parent::__construct();

        $this->sql ="CREATE TABLE user
        (
            id INT PRIMARY KEY NOT NULL,
            name VARCHAR(255) NOT NULL UNIQUE,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            access VARCHAR(255) NOT NULL DEFAULT 'guest',
            creation_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        )";
    }
}