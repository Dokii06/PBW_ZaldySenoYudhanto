<?php
session_start();
unset($_SESSION['name']);
$_SESSION['danger'] = "Logout Successful";
header("Location:login.php");
?>