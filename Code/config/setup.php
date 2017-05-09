<?php
require_once("database.php");

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

$dbh2->exec("INSERT INTO `Photos`(`id`, `name`,`userId`) VALUES (1,'lito',1) ON DUPLICATE KEY UPDATE `id` = 1");
$dbh2->exec("INSERT INTO `Photos`(`id`, `name`,`userId`) VALUES (2,'lito2',1) ON DUPLICATE KEY UPDATE `id` = 2");
$dbh2->exec("INSERT INTO `Photos`(`id`, `name`,`userId`) VALUES (3,'Iron_Jonas',2) ON DUPLICATE KEY UPDATE `id` = 3");
$dbh2->exec("INSERT INTO `Photos`(`id`, `name`,`userId`) VALUES (4,'will1',3) ON DUPLICATE KEY UPDATE `id` = 4");
$dbh2->exec("INSERT INTO `Photos`(`id`, `name`,`userId`) VALUES (5,'will2',3) ON DUPLICATE KEY UPDATE `id` = 5");
$dbh2->exec("INSERT INTO `Photos`(`id`, `name`,`userId`) VALUES (6,'jessica1',4) ON DUPLICATE KEY UPDATE `id` = 6");
$dbh2->exec("INSERT INTO `Photos`(`id`, `name`,`userId`) VALUES (7,'emma1',4) ON DUPLICATE KEY UPDATE `id` = 7");



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
//password 123456789a
$dbh2->exec("INSERT INTO `Users`(`id`, `userName`,`mail`,`password`) VALUES (1,'Jo1','jbelless@student.42.fr','038eece76d1733ccfcd8a93c5ba5e9eef673c3bb5898c42a569811fdbb30fa344ef591e5a7fbf48df67c3640bd505c5ed1adfa25bb925bb71b20c73fcf506209') ON DUPLICATE KEY UPDATE `id` = 1");
$dbh2->exec("INSERT INTO `Users`(`id`, `userName`,`mail`,`password`) VALUES (2,'Jo2','jbelless@student.42.fr','038eece76d1733ccfcd8a93c5ba5e9eef673c3bb5898c42a569811fdbb30fa344ef591e5a7fbf48df67c3640bd505c5ed1adfa25bb925bb71b20c73fcf506209') ON DUPLICATE KEY UPDATE `id` = 2");
$dbh2->exec("INSERT INTO `Users`(`id`, `userName`,`mail`,`password`) VALUES (3,'Jo3','jbelless@student.42.fr','038eece76d1733ccfcd8a93c5ba5e9eef673c3bb5898c42a569811fdbb30fa344ef591e5a7fbf48df67c3640bd505c5ed1adfa25bb925bb71b20c73fcf506209') ON DUPLICATE KEY UPDATE `id` = 3");
$dbh2->exec("INSERT INTO `Users`(`id`, `userName`,`mail`,`password`) VALUES (4,'Jo4','jbelless@student.42.fr','038eece76d1733ccfcd8a93c5ba5e9eef673c3bb5898c42a569811fdbb30fa344ef591e5a7fbf48df67c3640bd505c5ed1adfa25bb925bb71b20c73fcf506209') ON DUPLICATE KEY UPDATE `id` = 4");


$dbh2->exec("CREATE TABLE IF NOT EXISTS Comments (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    photoId SMALLINT NOT NULL,
    comment TEXT,
    userId int(11),
    PRIMARY KEY (id)
    )");
//comments
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (1,1,'Sympat la photo. gg',2) ON DUPLICATE KEY UPDATE `id` = 1");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (2,1,'LITO meet Sun',4) ON DUPLICATE KEY UPDATE `id` = 2");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (3,2,'space cowBoy!!',2) ON DUPLICATE KEY UPDATE `id` = 3");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (4,3,'Vraiment honteux.',4) ON DUPLICATE KEY UPDATE `id` = 4");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (5,3,'pourquoi?',1) ON DUPLICATE KEY UPDATE `id` = 5");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (6,4,'Will tu dechires!!!',2) ON DUPLICATE KEY UPDATE `id` = 6");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (7,5,'Will why you look so serious?',1) ON DUPLICATE KEY UPDATE `id` = 7");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (8,5,'Realy?',3) ON DUPLICATE KEY UPDATE `id` = 8");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (9,6,'Jesseica President!',1) ON DUPLICATE KEY UPDATE `id` = 9");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (10,6,':P',4) ON DUPLICATE KEY UPDATE `id` = 10");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (11,7,'Sympa Hermione',1) ON DUPLICATE KEY UPDATE `id` = 11");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (12,7,'C\'est pas la meme Emma tocard',2) ON DUPLICATE KEY UPDATE `id` = 12");
$dbh2->exec("INSERT INTO `Comments`(`id`, `photoId`,`comment`,`userId`) VALUES (13,7,'XD, ptdr',3) ON DUPLICATE KEY UPDATE `id` = 13");

$dbh2->exec("CREATE TABLE IF NOT EXISTS Likes (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    photoId SMALLINT NOT NULL,
    userId int(11),
    PRIMARY KEY (id)
    )");
//likes
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (1,1,2) ON DUPLICATE KEY UPDATE `id` = 1");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (2,1,4) ON DUPLICATE KEY UPDATE `id` = 2");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (3,2,2) ON DUPLICATE KEY UPDATE `id` = 3");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (4,3,4) ON DUPLICATE KEY UPDATE `id` = 4");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (5,3,1) ON DUPLICATE KEY UPDATE `id` = 5");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (6,3,2) ON DUPLICATE KEY UPDATE `id` = 6");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (7,4,1) ON DUPLICATE KEY UPDATE `id` = 7");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (8,5,3) ON DUPLICATE KEY UPDATE `id` = 8");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (9,5,2) ON DUPLICATE KEY UPDATE `id` = 9");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (10,6,1) ON DUPLICATE KEY UPDATE `id` = 10");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (11,6,4) ON DUPLICATE KEY UPDATE `id` = 11");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (12,7,1) ON DUPLICATE KEY UPDATE `id` = 12");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (13,7,2) ON DUPLICATE KEY UPDATE `id` = 13");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (14,7,3) ON DUPLICATE KEY UPDATE `id` = 14");
$dbh2->exec("INSERT INTO `Likes`(`id`, `photoId`, `UserId`) VALUES (15,7,4) ON DUPLICATE KEY UPDATE `id` = 15");

$dbh = null;
$dbh2 = null;
?>