<?php
session_start();
if(isset($_SESSION['member'])){
	$username = $_SESSION['member'];
}
$pengirim	= $username;
$penerima	= $_POST['penjawab'];
$isi	 	= $_POST['isi'];
$tanggal	= date("Y-m-d H:i:s");

include 'koneksi.php';
$sql = "INSERT INTO pesan (pengirim,penerima,pesan,tanggal) VALUES ('$pengirim','$penerima','$isi','$tanggal')";
$hasil = mysql_query($sql, $koneksi);

if($hasil){
	echo "<script> alert('Pesan telah terkirim!'); location = 'member.php'; </script>";
}
else {
	echo "<script> alert('Pesan gagal dikirim!'); location = 'member.php';</script>";
}	

?>
