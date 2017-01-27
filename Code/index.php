<?php
session_start();
$_SESSION['log'] = false;
include("config/setup.php");
header("Location: ./sources/main.php");
?>