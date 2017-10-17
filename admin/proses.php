
	<?php
		include"koneksi.php";

		$username = $_POST['username'];
		$password = md5($_POST['pass']);
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$fileName = $_FILES['gambar']['name'];
		$tanggal_daftar	= date("Y/m/d");
		if($fileName==''){
			$fileName="default.png";
		}
		$query = mysql_query("insert into member values
		('', '$username', '$password', '$nama','$gender', '$email',  '$fileName', '$tanggal_daftar')") or die(mysql_error());
         move_uploaded_file($_FILES['gambar']['tmp_name'], "foto/".$_FILES['gambar']['name']);
		
		if($query){
			echo "<script> alert('Berhasil menambahkan member!'); location = 'member.php'; </script>";
		}
		else {
			echo "<script> alert('Gagal menambahkan member!'); location = 'member.php'; </script>";
	    }	
	?>
	
	
