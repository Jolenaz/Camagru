<?php
session_start();
require_once("../config/database.php");

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur!: " . $e->getMessage() . "<br/>");
    die();
}

$login = $_SESSION['user'];
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
        Mot de passe est incorrect
        <div>
            <form action="../pages/modify_email.php" method ="post"><input type="submit" value="Essayer encore "></form>
        </div>
        ';
        die();
}
else
{

	$mail = filter_input(INPUT_POST, mail, FILTER_SANITIZE_STRING);
	$sth = $dbh->prepare("UPDATE `Users` SET `mail`=? WHERE `userName`=?;");

	$sth->bindParam(1, $mail, PDO::PARAM_STR);
	$sth->bindParam(2, $login, PDO::PARAM_STR);
	$sth->execute();
	$result = $sth->fetch(PDO::FETCH_ASSOC);
}

$sth = null;
$dbh = null;

header('Location: ../pages/my_account.php');

?>
