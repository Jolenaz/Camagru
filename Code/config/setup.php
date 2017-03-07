<?php
include("database.php");

try {
    $dbh = new PDO("mysql:host=" . $DB_HOST, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur!: " . $e->getMessage() . "<br/>");
    die();
}

$dbh->exec("CREATE DATABASE IF NOT EXISTS Cama");

try {
    $dbh2 = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur!: " . $e->getMessage() . "<br/>");
    die();
}

$dbh2->exec("CREATE TABLE IF NOT EXISTS Images (
    id int(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(40),
    path VARCHAR(255),
    PRIMARY KEY (id)
    )");

$dbh2->exec("CREATE TABLE IF NOT EXISTS Sprites (
    id int(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(40),
    width int(11),
    height int(11),
    PRIMARY KEY (id)
    )");

$dbh2->exec("INSERT INTO `Sprites`(`id`, `name`, `width`,`height`) VALUES (1,'Choixpeau',500,385)");

$dbh2->exec("CREATE TABLE IF NOT EXISTS Users (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    userName VARCHAR(40) NOT NULL,
    mail VARCHAR(40),
    password CHAR(128) COLLATE utf8_unicode_ci NOT NULL,
    admin TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
    )");

$dbh2->exec("CREATE TABLE IF NOT EXISTS Comments (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    imageId SMALLINT NOT NULL,
    comment TEXT,
    PRIMARY KEY (id)
    )");

?>