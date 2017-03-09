<?php
session_start();
$_SESSION['log'] = false;
include_once ("config/setup.php");
header("Location: ./pages/main.php");
?>