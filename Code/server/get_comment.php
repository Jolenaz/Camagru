<?php
require_once('../config/database.php');

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur202!: " . $e->getMessage() . "<br/>");
    die();
}

$photoId = filter_input(INPUT_POST, id, FILTER_SANITIZE_STRING);

$sth = $dbh->prepare("SELECT * FROM `Comments` WHERE  `photoId` = ?;");
$sth->bindParam(1, $photoId, PDO::PARAM_STR);
$sth->execute();

$response = "";


while($result = $sth->fetch(PDO::FETCH_ASSOC))
{
	$comment = "{'userId':" . $result['userId'] . ",'comment':" . $result['comment'] . "},";
	$response .= $comment;
}

print($response);
?>