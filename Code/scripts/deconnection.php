<?php
session_start();

$_SESSION['log'] = false;

header('Location: ../pages/main.php');

?>