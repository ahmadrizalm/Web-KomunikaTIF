<?php
session_start();
if(isset($_SESSION['member'])){
$username = $_SESSION['member'];
}

$pengirim		= $username;
$topik			= $_POST['judul'];
$isi	 		= $_POST['isi'];
$tanggal		= date("Y-m-d H:i:s");

include 'koneksi.php';
$sql = "INSERT INTO topik (pengirim, topik, isi, tanggal) VALUES ('$pengirim', '$topik', '$isi', '$tanggal')";
$hasil = mysql_query($sql, $koneksi);

		if($hasil){
			echo "<script> alert('Posting telah dibuat!'); location = 'home.php'; </script>";
		}
		else {
			echo "<script> alert('Posting gagal dibuat!'); location = 'home.php'; </script>";
	    }	


?>
