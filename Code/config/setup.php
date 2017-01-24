<?php
include("database.php");

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    print("Connection OK");
} catch (PDOException $e){
    print ("Erreur!: " . $e->getMessage . "<br?>");
    die();
}

$dbh->exec("CREATE DATABASE IF NOT EXISTS test");


?>