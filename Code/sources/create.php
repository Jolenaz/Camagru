<?php
session_start();
try {
    $dbh = new PDO("mysql:dbname=Cama;host=localhost", "root", "");
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
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
            <form action="connection.php" method ="post"><input type="submit" value="Annuler"></form>
        </div>
        ';
        die();
}


$pass = filter_input(INPUT_POST, passwd, FILTER_SANITIZE_STRING);
$mail = filter_input(INPUT_POST, mail, FILTER_SANITIZE_STRING);

$pass = hash("whirlpool", $pass);

$sth = $dbh->prepare("INSERT INTO `Users` (`userName`, `mail`, `password`, `admin`) VALUES (?, ?, ?, '0');");

$sth->bindParam(1, $login, PDO::PARAM_STR);
$sth->bindParam(2, $mail, PDO::PARAM_STR);
$sth->bindParam(3, $pass, PDO::PARAM_STR);

$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);

$_SESSION['log'] = true;

header('Location: main.php');

?>