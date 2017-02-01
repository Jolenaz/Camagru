<?php
session_start();
try {
    $dbh = new PDO("mysql:dbname=Cama;host=localhost", "root", "");
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$pass = filter_input(INPUT_POST, passwd, FILTER_SANITIZE_STRING);
$pass2 = filter_input(INPUT_POST, passwd2, FILTER_SANITIZE_STRING);

if ($pass != $pass2)
{
      print '
        le Mot de passe et la confirmation de correspondent pas
        <div>
            <form action="../pages/create_account.php" method ="post"><input type="submit" value="Essayer encore "></form>
        </div>
        ';
        die();  
}

$login = filter_input(INPUT_POST, login, FILTER_SANITIZE_STRING);

$sth = $dbh->prepare("SELECT * FROM `Users` WHERE `userName` = ?");

$sth->bindParam(1, $login, PDO::PARAM_STR);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);

if ($result != null)
{
    print '
        User name allrady exist!
        <div>
            <form action="../pages/connection.php" method ="post"><input type="submit" value="Annuler"></form>
        </div>
        ';
        die();
}



$mail = filter_input(INPUT_POST, mail, FILTER_SANITIZE_STRING);

$pass = hash("whirlpool", $pass);

$sth = $dbh->prepare("INSERT INTO `Users` (`userName`, `mail`, `password`, `admin`) VALUES (?, ?, ?, '0');");

$sth->bindParam(1, $login, PDO::PARAM_STR);
$sth->bindParam(2, $mail, PDO::PARAM_STR);
$sth->bindParam(3, $pass, PDO::PARAM_STR);

$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);

$_SESSION['log'] = true;

header('Location: ../pages/main.php');

?>