<?php
session_start();
if(isset($_SESSION['member'])){
$username = $_SESSION['member'];
}

$no 			= $_POST['nopost'];
$topik			= $_POST['judul'];
$isi	 		= $_POST['isi'];

include 'koneksi.php';
$sql = "UPDATE topik SET topik='$topik', isi='$isi' WHERE id_topik='$no'";
$hasil = mysql_query($sql, $koneksi);

		if($hasil){
			echo "<script> alert('Posting berhasil diubah!'); location = 'home.php'; </script>";
		}
		else {
			echo "<script> alert('Posting gagal diubah!'); location = 'home.php'; </script>";
	    }	


?>
