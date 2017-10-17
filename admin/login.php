<?php
session_start();
include '../koneksi.php';


$username = $_POST['username'];
$password = $_POST['password'];

$username = mysql_real_escape_string($username);
$password = md5(mysql_real_escape_string($password));

$q = mysql_query("select * from admin where username='$username' and password='$password'");

if (mysql_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
	$_SESSION['admin'] = $username;
	
	//redirect ke halaman index
	header('location:home.php');
} else {
	//kalau username ataupun password tidak terdaftar di database
	echo "<script> alert('username atau password anda salah.'); location = 'index.php'; </script>";

}
?>