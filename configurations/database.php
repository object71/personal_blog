<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/database/MysqliDb.php";

    global $database;
    $database = new MySQLiDb('localhost', 'root', 'root', 'PHP_Blog_Dev');
    
?>
