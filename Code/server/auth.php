<?php
session_start();
require_once("../config/database.php");

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur!: " . $e->getMessage() . "<br/>");
    die();
}

$login = filter_input(INPUT_POST, login, FILTER_SANITIZE_STRING);
$pass = filter_input(INPUT_POST, passwd, FILTER_SANITIZE_STRING);

$pass = hash("whirlpool", $pass);

$sth = $dbh->prepare("SELECT * FROM `Users` WHERE `userName` = ? AND `password` = ?;");

$sth->bindParam(1, $login, PDO::PARAM_STR);
$sth->bindParam(2, $pass, PDO::PARAM_STR);
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
        <h1 style="texte-align:center;">La combinaision Identifiant / Mot de passe est incorrect</h1>
            
        <div class="navigation_box">

        <form class="navigation_box_component"action="../pages/connection.php" method ="post">
            <input class="nav_button" type="submit" value="Essayer encore ">
        </form>
        <form class="navigation_box_component"action="../pages/lostMail.php">
            <input class="nav_button"type="submit" value="Mots de passe oublié">
        </form>
        </div>
        
    </body>';
        die();
}
else
{
    $_SESSION['id'] = $result['id'];
}

$sth = null;
$dbh = null;
$_SESSION['log'] = true;
$_SESSION['user'] = $login;

header('Location: ../pages/main.php');

?>