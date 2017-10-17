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
		#kotakPesan {
			margin: 0px 0px 10px 0px;
			border-style: solid;
			border-color: #cccccc;
			border-width: 1px;
			border-radius: 5px;
			padding: 10px;
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
			<li><a href="menu.php">Home</a></li>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="chat.php">Shoutbox</a></li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</div>
	Halaman Awal<hr>
	<?php
		include "koneksi.php";
		if(isset($_POST["masuk"])){
			$login = $_POST['nama'];
			$database = mysql_query ("SELECT * FROM pengguna WHERE id=\"$login\"");
			$hasil = mysql_fetch_array($database);
			if($login=="admin"){
				setcookie("nama", $login, time()+1000);
				header("location:menuAdmin.php");
			}
			else if($_POST['pass']==$hasil['password']){
				echo "Login berhasil!<br>";
				setcookie("nama", $login, time()+1000);
				header("location:menu.php");
			}
			else{
				echo "Nama atau password anda salah!<br>";
				setcookie("salah", "Nama atau password anda salah!", time()+5);
				header("location:index.php");
			}
		}
		echo "ID : " . $_COOKIE["nama"] . "<br>";
		echo "Status : Online<br>";
	?>

	<hr>Beranda<hr>
	
	<?php
		$fh=fopen("riwayat.txt", "r");
		while(!feof($fh)){
			$nama = fgets($fh);
			$judul = fgets($fh);
			$emot = fgets($fh);
			$garis = fgets($fh);
			$komentar=false;
			if (stripos($nama, "Nama") !== false) {
				$nama = substr($nama, 6, strlen($nama));
				echo "<div id='kotakPesan'>";
				echo "ID " . $nama . "</br>";
			}
			if (stripos($judul, "Judul") !== false){
				$judul = substr($judul, 6, strlen($judul));
				echo "Judul " . $judul . "</br>";
			}
			if (stripos($emot, "Posting") !== false) {
				$emot = substr($emot, 7, strlen($emot));
				$emot = str_replace(":)", "<img src=smile.jpg>",$emot);
				$emot = str_replace("B)", "<img src= cool.jpg>",$emot);
				$emot = str_replace(":'(", "<img src= cry.jpg>",$emot);
				$emot = str_replace(":D", "<img src= smile_d.jpg>",$emot);
				$emot = str_replace("0_0", "<img src= hah.jpg>",$emot);
				$emot = str_replace("^_^", "<img src= kiki.jpg>",$emot);
				$emot = str_replace(":*", "<img src= kiss.jpg>",$emot);
				$emot = str_replace(":v", "<img src= pacman.jpg>",$emot);
				$emot = str_replace(":(", "<img src= sad.jpg>",$emot);
				$emot = str_replace(":p", "<img src= tongue.jpg>",$emot);
				$emot = str_replace(":/", "<img src= unsure.jpg>",$emot);
				$emot = str_replace(">.<", "<img src= upset.jpg>",$emot);
				$emot = str_replace(";)", "<img src= wink.jpg>",$emot);
				echo "Posting" . $emot . "</br>";
				$komentar=true;
			}
			if (stripos($garis, "----") !== false) {
				if  ($komentar) {
					$garis = substr($garis, 0, strlen($garis));
					echo "</div>";
				}
				$komentar=false;
			}
			
		}
		
		fclose($fh);
	?>
	</div>
	<div id ="footer" align="center">
		<br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>