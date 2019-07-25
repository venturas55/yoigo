<?php 
session_start();

$_SESSION['miusuario'] = "";
$_SESSION['micontrasena'] = "";
$_SESSION['miprivilegio'] = "";

session_destroy();
header("location: ./index.php");
?>
