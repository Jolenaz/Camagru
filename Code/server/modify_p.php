<?php
session_start();
require_once("../server/check_pass.php");
require_once("../config/database.php");

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur!: " . $e->getMessage() . "<br/>");
    die();
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
    <head>
    	<meta charset="utf-8">
	<title>Mon compte</title>
    <link rel="stylesheet" href="../css/body.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/navigation.css">
    </head>
    <body>
        <h1 style="texte-align:center;">Ancien mot de passe incorrect</h1>
            
        <div class="navigation_box">

        <form class="navigation_box_component"action="../pages/modify_pass.php" method ="post">
            <input class="nav_button" type="submit" value="Essayer encore ">
        </form>
        </div>
        
    </body>';
        die();
}


$pass = filter_input(INPUT_POST, passwd, FILTER_SANITIZE_STRING);
$pass2 = filter_input(INPUT_POST, passwd2, FILTER_SANITIZE_STRING);

if (!check_pass($pass))
{
      print '
        <head>
            <meta charset="utf-8">
            <title>Mon compte</title>
            <link rel="stylesheet" href="../css/body.css">
            <link rel="stylesheet" href="../css/header.css">
            <link rel="stylesheet" href="../css/navigation.css">
        </head>
        <h1 style="texte-align:center;">
            le mot de passe doit contenir au moins un chiffre et une lettre </br>
            le mot de passe doit avoir au moins 8 caracteres
            </h1>
            <div class="navigation_box">
                <form class="navigation_box_component" action="../pages/modify_pass.php" method ="post"><input class="nav_button"type="submit" value="Essayer encore "></form>
            </div>
            ';
        die();
}

if ($pass != $pass2)
{
      print '
        <head>
            <meta charset="utf-8">
            <title>Mon compte</title>
            <link rel="stylesheet" href="../css/body.css">
            <link rel="stylesheet" href="../css/header.css">
            <link rel="stylesheet" href="../css/navigation.css">
            </head>
        <body>
        <div>
            <h1 style="texte-align:center;">le Mot de passe et la confirmation de correspondent pas</h1>
            <div class="navigation_box">
                <form class="navigation_box_component"action="../pages/modify_pass.php" method ="post"><input class="nav_button" type="submit" value="Essayer encore "></form>
            <div>
        </body> 
            ';
        die();  
}

$pass = hash("whirlpool", $pass);
$sth = $dbh->prepare("UPDATE `Users` SET `password`=? WHERE `userName`=?;");

$sth->bindParam(1, $pass, PDO::PARAM_STR);
$sth->bindParam(2, $login, PDO::PARAM_STR);
$sth->execute();

$sth = null;
$dbh = null;

header('Location: ../pages/main.php');

?>