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

$dbh2->exec("CREATE TABLE IF NOT EXISTS Photos (
    id int(11) NOT NULL AUTO_INCREMENT,
    userId int(11),
    name VARCHAR(40),
    PRIMARY KEY (id)
    )");

$dbh2->exec("CREATE TABLE IF NOT EXISTS Sprites (
    id int(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(40),
    format VARCHAR(4),
    PRIMARY KEY (id)
    )");

$dbh2->exec("INSERT INTO `Sprites`(`id`, `name`,`format`) VALUES (1,'Choixpeau','png') ON DUPLICATE KEY UPDATE `id` = 1");
$dbh2->exec("INSERT INTO `Sprites`(`id`, `name`,`format`) VALUES (2,'Pipe','png') ON DUPLICATE KEY UPDATE `id` = 2");
$dbh2->exec("INSERT INTO `Sprites`(`id`, `name`,`format`) VALUES (3,'Iron_Tatoo','png') ON DUPLICATE KEY UPDATE `id` = 3");
$dbh2->exec("INSERT INTO `Sprites`(`id`, `name`,`format`) VALUES (4,'Sun','png') ON DUPLICATE KEY UPDATE `id` = 4");
$dbh2->exec("INSERT INTO `Sprites`(`id`, `name`,`format`) VALUES (5,'UFO','png') ON DUPLICATE KEY UPDATE `id` = 5");


$dbh2->exec("CREATE TABLE IF NOT EXISTS Users (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    userName VARCHAR(40) NOT NULL,
    mail VARCHAR(40),
    password CHAR(128) COLLATE utf8_unicode_ci NOT NULL,
    admin TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
    )");

$dbh2->exec("INSERT INTO `Users`(`id`, `userName`,`mail`,`password`) VALUES (1,'Jo1','jbelless@student.42.fr','44ccce730474caf4aa56cc0a87120e0b678c631e78f28410dd5e85679e4249e46cb1d4353d309d4191a7f1b0c900eeae6c60685c1993fcf98c319df42e0b51eb') ON DUPLICATE KEY UPDATE `id` = 1");
$dbh2->exec("INSERT INTO `Users`(`id`, `userName`,`mail`,`password`) VALUES (2,'Jo2','jbelless@student.42.fr','44ccce730474caf4aa56cc0a87120e0b678c631e78f28410dd5e85679e4249e46cb1d4353d309d4191a7f1b0c900eeae6c60685c1993fcf98c319df42e0b51eb') ON DUPLICATE KEY UPDATE `id` = 2");
$dbh2->exec("INSERT INTO `Users`(`id`, `userName`,`mail`,`password`) VALUES (3,'Jo3','jbelless@student.42.fr','44ccce730474caf4aa56cc0a87120e0b678c631e78f28410dd5e85679e4249e46cb1d4353d309d4191a7f1b0c900eeae6c60685c1993fcf98c319df42e0b51eb') ON DUPLICATE KEY UPDATE `id` = 3");
$dbh2->exec("INSERT INTO `Users`(`id`, `userName`,`mail`,`password`) VALUES (4,'Jo4','jbelless@student.42.fr','44ccce730474caf4aa56cc0a87120e0b678c631e78f28410dd5e85679e4249e46cb1d4353d309d4191a7f1b0c900eeae6c60685c1993fcf98c319df42e0b51eb') ON DUPLICATE KEY UPDATE `id` = 4");


$dbh2->exec("CREATE TABLE IF NOT EXISTS Comments (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    photoId SMALLINT NOT NULL,
    comment TEXT,
    userId int(11),
    PRIMARY KEY (id)
    )");

$dbh2->exec("CREATE TABLE IF NOT EXISTS Likes (
    photoId SMALLINT NOT NULL,
    userId int(11)
    )");

$dbh = null;
$dbh2 = null;
?>