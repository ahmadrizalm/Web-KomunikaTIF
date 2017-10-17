<?php 
include'../koneksi.php';

$id = $_GET['id'];

$query = mysql_query("delete from member where username='$id'") or die(mysql_error());

if($query){
echo "<script> alert('Data member berhasil dihapus'); location = 'member.php'; </script>";
}
else {
	echo "Data gagal dihapus <br>";
	}	

?>