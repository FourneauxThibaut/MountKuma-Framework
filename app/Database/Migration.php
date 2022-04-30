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
        require($_SERVER['DOCUMENT_ROOT'] . '/app/Database/Database.php');
        $this->db = Database::connect();
    }

    public function add(array $data)
	{
        $sql = "INSERT INTO `{$data['table']}` (`" . implode('`, `', array_keys($data['data'])) . "`) VALUES ('" . implode("', '", $data['data']) . "')";
        $this->db->query($sql);
	}

    public function exist($table)
    {
        $request = '';

        $request = $this->db->select(
            'SELECT id FROM '.$table.' LIMIT 1'
        );


        if ( $request ){
            return true;
        }
        else{
            return false;
        }


        $request = $request ? true : false;

        return $request;
    }
}