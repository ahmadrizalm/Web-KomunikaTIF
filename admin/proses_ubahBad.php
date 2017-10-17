<?php
	include "koneksi.php";
	$id = $_POST['id'];
	$bdwrds = $_POST['baru'];
	$query = mysql_query("update cencor set badword='$bdwrds' where id_cencor = $id");
		
	if($query){
		echo "<script> alert('Badwords telah berhasil diubah!'); location = 'badword.php'; </script>";
	}
	else {
		echo "<script> alert('Badwords gagal untuk diubah!'); location = 'badword.php'; </script>";
    }	
?>