<html>
<head>
	<title>KomunikaTIF</title>
    <link rel="stylesheet" href="css/daftar.css" />
</head>
<body>
<img src="gambar/ilkom.gif"><img src="gambar/filkom.png" align="right">
<div class="home">
	<form action="proses.php" method="POST" enctype="multipart/form-data">
		Selamat datang di KomunikaTIF !<br>
		"Forum Mahasiswa Informatika"<br>
		<hr>
		Daftar Baru<br>
		<br>
		<table>
		<tr><td>Username : </td><td><input type="text" name="username" required></td><td>*</td></tr>
        <tr><td>Nama: </td><td><input type="text" name="nama" required></td><td>*</td></tr>
		<tr><td>Email : </td><td><input type="email" name="email" required></td><td>*</td></tr>
		<tr><td>Gender : </td>
		<td><input type="radio" name="gender" <?php if (isset($gender)) ?> value="Laki-Laki">Laki-Laki
		<input type="radio" name="gender" <?php if (isset($gender)) ?> value="Perempuan">Perempuan</td></tr>
		<tr><td>Password  : </td><td><input type="password" name="pass" required></td><td>*</td></tr>
		<tr><td>Foto</td>
				<td colspan="4">Upload Gambar (Ukuran Maks = 1 MB) : <input type="file" name="gambar"  />
		</tr>	
        <tr><td></td><td><input type="submit" name="masuk" value="Daftar"></td></tr>
		</table>
		<br>
		*) Harus diisi
	</form>
	</div>
	<div id ="footer" align="center">
		<br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>