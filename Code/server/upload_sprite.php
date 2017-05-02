<?php
session_start();
$name = filter_input(INPUT_POST, name, FILTER_SANITIZE_STRING);
$format = filter_input(INPUT_POST, format, FILTER_SANITIZE_STRING);

$uploadOk = 1;
$info = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if ($_FILES["fileToUpload"]["size"] > 500000)
    $uploadOk = 0;
if($info['mime'] !== "image/".$format)
    $uploadOk = 0;

if ($uploadOk == 0)
{
    header('Location: ../pages/montage.php');
    return;
}

require_once("../config/database.php");

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e){
    print ("Erreur!: " . $e->getMessage() . "<br/>");
    die();
}

//Ajout a la base de donnees
$sth = $dbh->prepare("INSERT INTO `Sprites` (`name`,`format`) VALUES (?,?);");
$sth->bindParam(1, $name, PDO::PARAM_STR);
$sth->bindParam(2, $format, PDO::PARAM_STR);
$sth->execute();

//telechargement sur le server

$sth = $dbh->prepare("SELECT MAX(`id`) FROM `Sprites`;");
$sth->execute();
$result = $sth->fetch();

$id = $result[0];

$rep = "../sprites/sp".$id.".".$format;

if ($format == "png")
    $img = imagecreatefrompng($_FILES["fileToUpload"]["tmp_name"]);
else if ($format == "jpeg")
    $img = imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]);

imagealphablending($img, true);
imagesavealpha($img, true);

if ($format == "png")
    imagepng($img, "../sprites/sp".$id.".png");
else if ($format == "jpeg")
    imagejpeg($img, "../sprites/sp".$id.".jpeg");

$sth = null;
$dbh = null;

header('Location: ../pages/montage.php');

?>