<?php 
session_start();
if(!isset($_SESSION["usuario"]))
	header("Location: login.php");
else {
	$usuario=$_SESSION["usuario"];
	$tipo=$_SESSION["tipo"];
}
?>
