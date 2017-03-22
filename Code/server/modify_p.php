<?php
session_start();
include("../server/check_pass.php");
try {
    $dbh = new PDO("mysql:dbname=Cama;host=localhost", "root", "");
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$login = $_SESSION['user'];

$old_passwd = filter_input(INPUT_POST, old_passwd, FILTER_SANITIZE_STRING);
$old_passwd = hash("whirlpool", $old_passwd);

$sth = $dbh->prepare("SELECT * FROM `Users` WHERE `userName` = ? AND `password` = ?;");

$sth->bindParam(1, $login, PDO::PARAM_STR);
$sth->bindParam(2, $old_passwd, PDO::PARAM_STR);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);

if ($result == null)
{
    print '
        Ancien mot de passe incorrect
        <div>
            <form action="../pages/modify_pass.php" method ="post"><input type="submit" value="Essayer encore "></form>
        </div>
        ';
        die();
}


$pass = filter_input(INPUT_POST, passwd, FILTER_SANITIZE_STRING);
$pass2 = filter_input(INPUT_POST, passwd2, FILTER_SANITIZE_STRING);

if (!check_pass($pass))
{
    print '
        le mot de passe doit contenir au moins un chiffre et une lettre </br>
        le mot de passe doit avoir au moins 8 caracteres
        <div>
            <form action="../pages/modify_pass.php" method ="post"><input type="submit" value="Essayer encore "></form>
        </div>
        ';
        die();
}

if ($pass != $pass2)
{
      print '
        le Mot de passe et la confirmation de correspondent pas
        <div>
            <form action="../pages/modify_pass.php" method ="post"><input type="submit" value="Essayer encore "></form>
        </div>
        ';
        die();  
}

$pass = hash("whirlpool", $pass);
$sth = $dbh->prepare("UPDATE `Users` SET `password`=? WHERE `userName`=?;");

$sth->bindParam(1, $pass, PDO::PARAM_STR);
$sth->bindParam(2, $login, PDO::PARAM_STR);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);

$sth = null;
$dbh = null;

header('Location: ../pages/main.php');

?>