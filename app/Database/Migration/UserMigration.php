<?php

require($_SERVER['DOCUMENT_ROOT'] . '/app/Database/Migration.php');

Class UserMigration extends Migration
{

    public $table = 'users';


    public function __construct()
    {
        parent::__construct();

        $this->add( $this->table, [
            'name' => 'varchar(255) NOT NULL',
            'email' => 'varchar(255) NOT NULL',
            'password' => 'varchar(255) NOT NULL',
            'created_at' => 'datetime NOT NULL',
            'updated_at' => 'datetime NOT NULL'
        ]);
    }
}