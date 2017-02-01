<?php
session_start();
$_SESSION['log'] = false;
include("config/setup.php");
header("Location: ./pages/main.php");
?>