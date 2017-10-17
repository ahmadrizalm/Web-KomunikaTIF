<?php
session_start();
if(isset($_SESSION['admin'])){
$username = $_SESSION['admin'];
}
$id_topik		= $_POST['id_topik'];
$topik			= $_POST['topik'];
$penjawab		= $_POST['penjawab'];
$isi	 		= $_POST['isi'];

$tanggal		= date("Y-m-d H:i:s");

include 'koneksi.php';




$sql = "INSERT INTO komentar (id_topik, topik, penjawab,  isi, tgl_komentar) VALUES ('$id_topik', '$topik', '$penjawab', '$isi', '$tanggal')";
$hasil = mysql_query($sql, $koneksi);


		if($hasil){
			echo "<script> alert('Berhasil mengkomentari posting!'); location = 'home.php'; </script>";
		}
		else {
			echo "<script> alert('Tidak bisa mengkomentari posting!'); location = 'home.php'; </script>";
	    }	

$query_balasan = mysql_query("SELECT topik FROM komentar WHERE id_topik='$id_topik'");
$total_balas = mysql_num_rows($query_balasan);
$total_balasan = $total_balas;

//memasukan total balasan ke database


$sql2 = "UPDATE topik SET total_komentar='$total_balasan' WHERE id_topik='$id_topik'";
$hasil2 = mysql_query($sql2, $koneksi);

if($hasil2){
	echo "ok";
	}
else {
	echo "komentar gagal disimpan <br>";
	}	

?>
