<?php

use Database\Database;

Class Migration
{
    private $db;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Database/Database.php');
        $this->db = Database::connect();
    }

    public function add($name, $data)
	{
        if ( $this->exist($name) == false ) {

            die('Table ' . $name . ' already exist');
        }
        else {
            
            $table['name'] = $name;

            try {
                $this->db->insert(
                    'tables', 
                    $table
                );
            } catch (Exception $e) {

                die('Erreur : ' . $e->getMessage());
            }

            $migration = 'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                ';

            foreach ($data as $key => $value) {
                $migration .= $key . ' ' . $value . ',
                ';
            }

            $sql = 'CREATE TABLE '.$name.'(
                '.$migration.'
            )';

        }
	}

    public function exist($name)
    {
        $request = $this->db->select(
            'SELECT * FROM tables WHERE name = ?', [$name]
        );

        if (! $request ){
            return true;
        }
        else{
            return false;
        }
    }
}