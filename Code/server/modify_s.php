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

$passwd = filter_input(INPUT_POST, passwd, FILTER_SANITIZE_STRING);
$passwd = hash("whirlpool", $passwd);

$sth = $dbh->prepare("SELECT * FROM `Users` WHERE `userName` = ? AND `password` = ?;");

$sth->bindParam(1, $login, PDO::PARAM_STR);
$sth->bindParam(2, $passwd, PDO::PARAM_STR);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);

if ($result == null)
{
    print '
        La combinaision Identifiant / Mot de passe est incorrect
        <div>
            <form action="../pages/modify_pass.php" method ="post"><input type="submit" value="Essayer encore "></form>
        </div>
        <form action="../pages/lostMail.php">
				<input type="submit" value="Mots de passe oublié" />
		</form>
        ';
        die();
}
else
{
	$sth = $dbh->prepare("DELETE FROM `Users` WHERE `userName`=?;");

	$sth->bindParam(1, $login, PDO::PARAM_STR);
	$sth->execute();
	$result = $sth->fetch(PDO::FETCH_ASSOC);
}

$_SESSION['log'] = false;
$_SESSION['user'] = "";

$sth = null;
$dbh = null;

header('Location: ../pages/main.php');

?>