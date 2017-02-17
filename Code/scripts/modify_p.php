<?php
session_start();
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


$pass = filter_input(INPUT_POST, passwd, FILTER_SANITIZE_STRING);
$pass2 = filter_input(INPUT_POST, passwd2, FILTER_SANITIZE_STRING);

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
$sth = $dbh->prepare("UPDATE `Users` SET `password`=? WHERE `id`=?;");

$sth->bindParam(1, $pass, PDO::PARAM_STR);
$sth->bindParam(2, $login, PDO::PARAM_STR);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);

header('Location: ../pages/main.php');

?>