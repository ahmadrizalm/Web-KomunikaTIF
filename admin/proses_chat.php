<?php
session_start();
if(isset($_SESSION['admin'])){
	$username = $_SESSION['admin'];
}

$pengirim		= $username;
$topik			= $_POST['judul'];
$isi	 		= $_POST['isi'];
$tanggal		= date("Y-m-d H:i:s");

include 'koneksi.php';

$sql = "INSERT INTO topik (pengirim,topik,isi,tanggal) VALUES ('admin','$topik','$isi','$tanggal')";
$hasil = mysql_query($sql, $koneksi);

	if($hasil){
		echo "<script> alert('Berhasil membuat posting!'); location = 'home.php'; </script>";
	}
	else {
		echo "<script> alert('Gagal membuat posting!'); location = 'home.php'; </script>";
    }	


?>
