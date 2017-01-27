<?php

try {
    $dbh = new PDO("mysql:dbname=Cama;host=localhost", "root", "");
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$login = filter_input(INPUT_POST, login, FILTER_SANITIZE_STRING);

$pass = filter_input(INPUT_POST, passwd, FILTER_SANITIZE_STRING);

$pass = hash("whirlpool", $pass);

$sth = $dbh->prepare("SELECT * FROM `Users` WHERE `userName` = ?");

$sth->bindParam(1, $login, PDO::PARAM_STR);
$sth->execute();

$result = $sth->fetch(PDO::FETCH_ASSOC);

if ($result == null)
    print 'resultat null';
else
    print_r ($result);

$result = $sth->fetch(PDO::FETCH_ASSOC);

if ($result == null)
    print 'resultat null';
else
    print_r ($result);

// $stmt = mysqli_prepare($con, $sql);
// if ($stmt){
// 	mysqli_stmt_bind_param($stmt, 's', $login);
// 	mysqli_stmt_execute($stmt);
// 	mysqli_store_result($con);
// 	if (mysqli_stmt_fetch($stmt) == 1)
// 	{
// 		echo "Compte non valide!";
// 		include('./index.html');
// 	}
// 	else
// 	{
// 			$pass = filter_input(INPUT_POST, passwd,FILTER_SANITIZE_STRING);
// 			$pass = hash("whirlpool", $pass);
// 			$req = "INSERT INTO members (login, password,admin) VALUES (?, ?,'0');";
// 			$stmt = mysqli_prepare($con, $req);
// 			if ($stmt){
// 				mysqli_stmt_bind_param($stmt, 'ss', $login,$pass);
// 				mysqli_stmt_execute($stmt);
// 			}
// 			header('Location: ../connection.php');
// 	}
// 	mysqli_stmt_close($stmt);
// }
?>