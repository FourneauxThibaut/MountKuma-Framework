<?php

$tables = [
    'UserMigration' => './Migration/UserMigration.php',
];

foreach ($tables as $key => $table) {
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Database/' . $table);
    $migration = new $key();
}
die();