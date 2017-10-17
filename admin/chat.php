<?php 
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
	//redirect ke halaman login
	header('location:index.php');
}

if(isset($_SESSION['admin'])){
	$username = $_SESSION['admin'];
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
		input, textarea {
			padding: 5px;
			width: 200%;
			border-radius: 5px;
			border-style: solid;
			border-width: 1px;
			border-color: #cccccc;
			font-family: "Open Sans", sans-serif;
			box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);
		}
		input[type="submit"] {
			margin-top: 5px;
			background-color: #44a4e0;
			border-style: none;
			align: right;
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
			color: white;
		}
		#keluaran {
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
			<li><a href="member.php">Daftar Member</a></li>
			<li><a href="chat.php">Shoutbox</a></li>
           <li><a href="badword.php">Kelola Badword</a></li>
			<li><a href="logout.php">Keluar</a></li>
		</ul>
	</div>
	Posting Admin<hr><br>
  <table>
	<form action="proses_chat.php" method="POST">
		<tr><td>Judul Post :</td></tr>
		<tr><td><input type="text" name="judul" id="judul" required></td></tr>
		<tr><td>Posting :</td></tr>
		<tr><td><textarea name="isi" required></textarea></td></tr>
		<tr><td><input type="reset" value="Kosongkan">
       <input type="submit" name="kirim" value="Kirim"></td></tr>
	</form>
	</table>
	<br><br>
	</div>
	<div id ="footer" align="center">
		<br><br><br><hr>
        <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>