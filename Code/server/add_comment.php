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
$dbh = null;

?>