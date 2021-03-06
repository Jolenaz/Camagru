<?php
require_once('../config/database.php');

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur202!: " . $e->getMessage() . "<br/>");
    die();
}

$photoId = filter_input(INPUT_POST, id, FILTER_SANITIZE_STRING);
$sth = $dbh->prepare("DELETE FROM `Photos` WHERE  `id` = ?;");
$sth->bindParam(1, $photoId, PDO::PARAM_STR);
$sth->execute();

$sth = null;
$dbh = null;

?>