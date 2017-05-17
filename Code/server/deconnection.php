<?php
session_start();

$_SESSION['log'] = false;
$_SESSION['id'] = "";
$_SESSION['user'] = "";

header('Location: ../pages/main.php');

?>