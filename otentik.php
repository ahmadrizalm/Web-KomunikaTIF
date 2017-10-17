<?php 
session_start();

if (!empty($_SESSION['member'])) {
	header('location:home.php');
}
if (!empty($_SESSION['admin'])) {
	header('location:admin/home.php');
}

?>
