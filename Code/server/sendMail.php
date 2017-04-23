<?php
session_start();
require_once("../config/database.php");

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur!: " . $e->getMessage() . "<br/>");
    die();
}

$mail = filter_input(INPUT_POST, mail, FILTER_SANITIZE_STRING);

$passWord = strtoupper(hash("crc32", time()));

$pass = hash("whirlpool", $passWord);



$sth = $dbh->prepare("SELECT userName FROM `Users` WHERE `mail` = ?;UPDATE `Users` SET `password`= ? WHERE `mail` = ?;");

$sth->bindParam(1, $mail, PDO::PARAM_STR);
$sth->bindParam(2, $pass, PDO::PARAM_STR);
$sth->bindParam(3, $mail, PDO::PARAM_STR);
$sth->execute();

$result = $sth->fetch(PDO::FETCH_ASSOC);

mail(
    $mail,
    "Camagru new passWord",
    "

        Your new password is: $passWord
        Your login is: " . $result[userName]
    
);

$sth = null;
$dbh = null;

header('Location: ../pages/main.php');

?>