<?php
	include"koneksi.php";

	$username = $_GET['uname'];
	$query = mysql_query("delete from member where username='$username'");
		
	if($query){
		echo "<script> alert('Member telah dihapus!'); location = 'member.php'; </script>";
	}
	else {
		echo "<script> alert('Member gagal dihapus!'); location = 'member.php'; </script>";
    }	
?>
	
	
