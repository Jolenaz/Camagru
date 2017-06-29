<?php
session_start();
require_once('../config/database.php');

if ($_SESSION['log'] != true)
{
    print("ERROR Connection");
    die;
}
    

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur202!: " . $e->getMessage() . "<br/>");
    die();
}

$photoId = filter_input(INPUT_POST, id, FILTER_SANITIZE_STRING);
$text = urldecode(filter_input(INPUT_POST, text, FILTER_SANITIZE_ENCODED));
$sth = $dbh->prepare("INSERT INTO `Comments`(`photoId`, `comment`,`userId`) VALUES (?,?,?);");
$sth->bindParam(1, $photoId, PDO::PARAM_STR);
$sth->bindParam(2, $text, PDO::PARAM_STR);
$sth->bindParam(3, $_SESSION['id'], PDO::PARAM_STR);
$sth->execute();

$sth = null;

$sth = $dbh->prepare("SELECT * FROM  `Photos` WHERE `id` = ?;");
$sth->bindParam(1, $photoId, PDO::PARAM_STR);
$sth->execute();
$ownerId = $sth->fetch(PDO::FETCH_ASSOC); 
$photoName = $ownerId[name];
$ownerId = $ownerId[userId];

$sth = null;
$sth = $dbh->prepare("SELECT `mail` FROM  `Users` WHERE `id` = ?;");
$sth->bindParam(1, $ownerId, PDO::PARAM_STR);
$sth->execute();
$mail = $sth->fetch(PDO::FETCH_ASSOC); 

$mail = $mail[mail];

mail(
    $mail,
    "You have new comment",
    "
		Your Picture ".$photoName . " receive a new comment :
        ". $text ."
    "
    
);


$sth = null;
$dbh = null;

?>