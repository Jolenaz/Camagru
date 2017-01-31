<?php
session_start();

try {
    $dbh = new PDO("mysql:dbname=Cama;host=localhost", "root", "");
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$mail = filter_input(INPUT_POST, mail, FILTER_SANITIZE_STRING);


$passWord = strtoupper(hash("crc32", time()));

print($passWord);

// $sth = $dbh->prepare("SELECT * FROM `Users` WHERE `userName` = ? AND `password` = ?;");

// $sth->bindParam(1, $login, PDO::PARAM_STR);
// $sth->bindParam(2, $pass, PDO::PARAM_STR);
// $sth->execute();
// $result = $sth->fetch(PDO::FETCH_ASSOC);

// if ($result == null)
// {
//     print '
//         La combinaision Identifiant / Mot de passe est incorrect
//         <div>
//             <form action="connection.php" method ="post"><input type="submit" value="Essayer encore "></form>
//         </div>
//         <form action="lostMail.php">
// 				<input type="submit" value="Mots de passe oublié" />
// 		</form>
//         ';
//         die();
// }

// $_SESSION['log'] = true;

// header('Location: main.php');

?>