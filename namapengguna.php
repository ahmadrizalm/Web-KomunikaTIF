<head>
	<style type="text/css">
		html {
			background-color: #3498DB;
		}
		body {
			font-family: "Open Sans", sans-serif;
			color: #666666;
			margin: 40px auto;
			border-radius: 10px;
			padding: 2em 4em 2em;
			max-width: 800px;
			line-height: 1.2em;
			font-size: 16px;
			background-color: white;
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
		}
		.home {
			margin: 20px 0px 20px 0px;
			border-style: solid;
			border-color: #cccccc;
			border-width: 1px;
			border-radius: 5px;
			padding: 15px;
		}
		#menuutama{
			margin: 0px 0px 10px 0px;
			border-style: solid;
			border-color: #cccccc;
			border-width: 1px;
			border-radius: 5px;
			padding: 1px;
		}
		ul#menu{
			padding-left:20px;
		}
		ul#menu li{
			display: inline;
		}
		ul#menu li a{
			margin:5px;
			width:300px;
			text-decoration: none;
			padding:5px 5px 5px 5px;
		}
		ul#menu li a:hover{
			background-image: url(pilih.png);
			background-repeat: no-repeat;
			background-position: center;
			border-radius: 5px;
		}
		#pemisah{
			height:50px;
		}
	</style>
	<title>KomunikaTIF</title>
</head>
<body>
	<img src="ilkom.gif"><img src="filkom.png" align="right">
	<div class="home">
	Selamat datang di KomunikaTIF !<br>
	"Forum Mahasiswa Informatika"<br><br>
	<div id="menuutama">
		<ul id="menu">
			<li><a href="menuAdmin.php">Home</a></li>
			<li><a href="profilAdmin.php">Profil</a></li>
			<li><a href="chatAdmin.php">Shoutbox</a></li>
			<li><a href="namapengguna.php">Daftar Pengguna</a></li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</div>
	<?php
		echo "Daftar Nama Pengguna KomunikaTIF<br>";
		echo "<hr>";
		include "koneksi.php";
		$login = $_COOKIE['nama'];
		$database = mysql_query ("SELECT * FROM tb_member");
		echo "<div id='tabelpengguna'>";
		echo "<table border='1'>";
		echo "<tr><td> ID </td>";
		echo "<td> Nama Lengkap </td></tr>";
		while($hasil = mysql_fetch_array($database)){
			echo "<tr><td>" . $hasil['id'] . "</td>";
			echo "<td>" . $hasil['namalengkap'] . "</td>";
			echo "<td>.<img src='gambar/".$hasil['foto']."' width='100px' height='100px'/>.</td>";
			echo "<td> Ubah </td>";
			echo "<td> Hapus </td></tr>";
		}
		echo "</table>";
		echo "</div>";
	?>
	<br>

	</div>
	<div id ="footer" align="center">
		<br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>