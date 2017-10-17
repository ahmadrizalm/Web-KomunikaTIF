<? 
session_start();
include "koneksi.php";
include "otentik.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KomunikaTIF</title>
<link rel="stylesheet" href="css/main.css" />
</head>
<body>
<img src="../gambar/ilkom.gif"><img src="../gambar/filkom.png" align="right">
	<div class="home">
    <div align="center">
	<form action="login.php" method="POST">
		Halaman Admin KomunikaTIF<br>
		"Forum Mahasiswa Informatika"<br>
		<hr>
		<br>
		
		<font color="red"><marquee>Halaman ini hanya boleh diakses oleh Admin KomunikaTIF!</marquee></font>
		<br><br>
		
		<table>
		<tr>
		  <td>Username :</td><td><input type="text" name="username" required></td></tr>
		<tr><td>Password  : </td><td><input type="password" name="password" required></td></tr>
		<tr><td></td><td align="right"><input type="submit" name="masuk" value="Masuk"></td></tr>
		</table>
	</form>
	<br><br><br>
</div>
</div>
	<div id ="footer" align="center">
		<br><br><br><br><br><hr>
        <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>