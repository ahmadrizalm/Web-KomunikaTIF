<?php
include 'koneksi.php';
$nama				= $_POST['nama'];
$username			= $_POST['username'];
$jenis_kelamin 	   = $_POST['gender'];
$fileName 			= $_FILES['gambar']['name'];
move_uploaded_file($_FILES['gambar']['tmp_name'], "foto/".$_FILES['gambar']['name']);
mysql_query ("UPDATE member SET foto='$fileName' WHERE username='$username'");

$sql = "UPDATE member SET nama='$nama', jenis_kelamin='$jenis_kelamin',  foto='$fileName' WHERE username='$username' ";
$hasil = mysql_query($sql, $koneksi);

if($hasil){
echo "<script> alert('Selamat! Profil Anda berhasil di perbaharui'); location = 'profil.php?username=$username'; </script>";
}
else {
	echo "Data gagal disimpan <br>";
	}	


 ?>
