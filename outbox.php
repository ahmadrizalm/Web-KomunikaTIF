
   <?php 
session_start();

if (!isset($_SESSION['member']) || empty($_SESSION['member'])) {
	header('location:index.php');
}
if(isset($_SESSION['member'])){
	$username = $_SESSION['member'];
}
	
?>
<html>
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
		#pesan{
			margin: 0px 0px 10px 0px;
			border-style: solid;
			border-color: #cccccc;
			border-width: 1px;
			border-radius: 5px;
			padding: 10px;
		}
		hr{
			border: 0;
			height: 0;
			border-top: 1px solid rgba(0,0,0,0.2);
			border-bottom: 1px solid rgba(255, 255, 255, 0.3);
		}
	</style>
	<title>KomunikaTIF</title>
</head>
<body>
	<img src="gambar/ilkom.gif"><img src="gambar/filkom.png" align="right">
	<div class="home">
	Selamat datang di KomunikaTIF !<br>
	"Forum Mahasiswa Informatika"<br><br>
	<div id="menuutama">
		<ul id="menu">
			<li><a href="home.php">Home</a></li>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="chat.php">Shoutbox</a></li>
            <li><a href="member.php">Member Lain</a></li>
			<li><a href="logout.php">Keluar</a></li>
		</ul>
	</div>
    Pesan Terkirim<hr>
	<div align="right">
	<a href="inbox.php?id=<?php echo $username; ?>">Pesan Masuk</a> ----
    <a href="outbox.php?id=<?php echo $username; ?>">Pesan Terkirim</a><br><br>
	</div>

	<?php
	include "koneksi.php";
	$saya = $_GET['id'];
	$sql = "SELECT * FROM pesan WHERE pengirim='$saya'";
	$mesg = mysql_query($sql,$koneksi);
	while($query=mysql_fetch_array($mesg)){
	
	?>
	
	<div id="pesan">
	ID #<?php echo $query['id_pesan']; ?> -
	dikirim tanggal : <?php echo $query['tanggal']; ?><hr>
	Pengirim : Saya (<?php echo $saya; ?>) <br>
	Penerima : <?php echo $query['penerima']; ?> <br>
	Isi Pesan : <?php echo $query['pesan']; ?><br>
	</div>
	<br>
	<?php
	}
	mysql_close();
	//berhentinya looping while
	?>
	
	</div>
<br><br>
	<div id ="footer" align="center">
		<br><hr>
        <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>