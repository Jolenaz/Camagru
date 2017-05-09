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

$response = '{"photoId":"'.$photoId .'","data":[';
$is_empty = 1;

while($result = $sth->fetch(PDO::FETCH_ASSOC))
{
    $is_empty = 0;
    $sth2 = $dbh->prepare("SELECT `userName` FROM `Users` WHERE  `id` = ?;");
    $sth2->bindParam(1, $result['userId'], PDO::PARAM_STR);
    $sth2->execute();
    $result2 = $sth2->fetch(PDO::FETCH_ASSOC);

	$comment = '{"userName":"' . $result2["userName"] . '","comment":"' . $result["comment"] . '"},';
	$response .= $comment;
    $sth2 = null;
}
if ($is_empty === 0)
    $response = substr($response, 0, -1);
$response .= "]}";
$sth = null;
$dbh = null;
print($response);
?>