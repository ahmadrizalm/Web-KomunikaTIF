<?php
	include "koneksi.php";
	$id = $_GET['id'];
	$query = mysql_query("delete from cencor where id_cencor='$id'");
		
	if($query){
		echo "<script> alert('Badwords telah berhasil dihapus!'); location = 'badword.php'; </script>";
	}
	else {
		echo "<script> alert('Badwords gagal untuk dihapus!'); location = 'badword.php'; </script>";
    }	
?>