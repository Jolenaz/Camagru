<?php
session_start();
try {
    $dbh = new PDO("mysql:dbname=Cama;host=localhost", "root", "");
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
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
            <form action="../pages/connection.php" method ="post"><input type="submit" value="Essayer encore "></form>
        </div>
        <form action="../pages/lostMail.php">
				<input type="submit" value="Mots de passe oublié" />
		</form>
        ';
        die();
}
else
{

	$mail = filter_input(INPUT_POST, mail, FILTER_SANITIZE_STRING);
	$sth = $dbh->prepare("UPDATE `Users` SET `mail`=? WHERE `id`=?;");

	$sth->bindParam(1, $mail, PDO::PARAM_STR);
	$sth->bindParam(2, $login, PDO::PARAM_STR);
	$sth->execute();
	$result = $sth->fetch(PDO::FETCH_ASSOC);
}


header('Location: ../pages/my_account.php');

?>
