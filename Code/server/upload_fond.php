<?php
session_start();
$_SESSION['fond'] = true;
$uploadOk = 1;

$info = getimagesize($_FILES["fondToUpload"]["tmp_name"]);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fondToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        print_r("1");
        $uploadOk = 0;
    }
}

if ($_FILES["fondToUpload"]["size"] > 500000)
    $uploadOk = 0;
if($info['mime'] !== "image/png" && $info['mime'] !== "image/jpeg")
    $uploadOk = 0;

if ($uploadOk == 0)
{
    header('Location: ../pages/montage.php');
    return;
}

move_uploaded_file($_FILES["fondToUpload"]["tmp_name"], "../tmp");

header('Location: ../pages/montage.php');



?>