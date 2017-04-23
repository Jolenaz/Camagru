<?php
session_start();
$_SESSION['log'] = false;
require_once ("config/setup.php");
header("Location: ./pages/main.php");
?>