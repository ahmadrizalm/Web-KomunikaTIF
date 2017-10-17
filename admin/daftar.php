<html>
<head>
	<title>KomunikaTIF</title>
    <link rel="stylesheet" href="css/daftar.css" />
</head>
<body>
<img src="gambar/ilkom.gif"><img src="gambar/filkom.png" align="right">
<div class="home">
	<form action="proses.php" method="POST" enctype="multipart/form-data">
        <div class="judul">
            Selamat datang di KomunikaTIF !<br>
            "Forum Mahasiswa Informatika"<br>
        </div>
		<br>
		<div id="menuutama">
		<ul id="menu">
			<li><a href="home.php">Home</a></li>
			<li><a href="member.php">Daftar Member</a></li>
			<li><a href="chat.php">Shoutbox</a></li>
           <li><a href="badword.php">Kelola Badword</a></li>
			<li><a href="logout.php">Keluar</a></li>
		</ul>
	</div>
		Tambah Member<hr>
		<br>
		<table>
		<tr><td>Username</td><td> : <input type="text" name="username" required></td><td>*</td></tr>
         <tr><td>Password</td><td> : <input type="password" name="pass" required></td><td>*</td></tr>
        <tr>
          <td>Nama Lengkap</td><td> : <input type="text" name="nama" required></td><td>*</td></tr>
		<tr><td>Email</td><td> : <input type="email" name="email" required /></td><td>*</td></tr>
		<tr><td>Gender</td>
		<td> : <input type="radio" name="gender"  value="Laki-Laki">Laki-Laki
		<input type="radio" name="gender" value="Perempuan">Perempuan</td></tr>
		<tr><td>Foto</td><td> : <input type="file" name="gambar"  /></tr>	
        <tr><td></td><td><input type="submit" name="masuk" value="Tambahkan"></td></tr>
		</table>
		<br>
		*) Harus diisi
	</form>
</div>
    <br><br><br><br>
	<div id ="footer" align="center">
		<hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>