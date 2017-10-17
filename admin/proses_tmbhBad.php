<?php
	include "koneksi.php";

	$bdwrds = $_POST['tambah'];
	$query = mysql_query("insert into cencor (id_cencor,badword) values (NULL,'$bdwrds')");
		
	if($query){
		echo "<script> alert('Badwords telah berhasil ditambahkan!'); location = 'badword.php'; </script>";
	}
	else {
		echo "<script> alert('Badwords gagal untuk ditambahkan!'); location = 'badword.php'; </script>";
    }	
?>