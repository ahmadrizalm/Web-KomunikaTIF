<?php 
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['member']) || empty($_SESSION['member'])) {
	//redirect ke halaman login
	header('location:index.php');
}
?>
<html>
<head>
	<title>KomunikaTIF</title>
    <link rel="stylesheet" href="css/home.css" />

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
	Halaman Awal<hr>
        <br>
	<div align="left">Anda Login Sebagai : <?php  echo $_SESSION['member']; echo " &nbsp;"?></div><br>
        

          <?php

include 'koneksi.php';
$nomor = 1;
$sql = "SELECT * FROM topik ORDER by tanggal DESC";
$hasil=mysql_query($sql,$koneksi);

function baca_query($query){
					include "koneksi.php";
					$hasil=mysql_query($query,$koneksi);
					return $hasil;
				}
			
				function replace_mesoh($string) {
					$data = baca_query("select * from cencor");
					while($badword = mysql_fetch_array($data)) {
						$string = str_replace($badword['badword'],"*sensor*",strtolower($string));
					}
					return $string;
				}

while($record=mysql_fetch_array($hasil)){
	$nama=$record['pengirim'];
	$qFoto=mysql_fetch_array(mysql_query("select * from member where username='$nama' "));
	if($qFoto==''){
		$qFoto=mysql_fetch_array(mysql_query("select * from admin where username='$nama'"));
	}
	echo "<div id='posting'>";
?>

            <font face="verdana" size="2">#<?php echo $nomor++; ?> -> <?php echo $record['tanggal']; ?>
			<?php 
			$pengguna=$_SESSION['member'];
			$pemilik=$record['pengirim'];
			if($pengguna==$pemilik){
			?>
			<div align="right">
			<a href="chatEdit.php?id_topik=<?php echo $record['id_topik']; ?>">Edit</a>
			<a href="proses_hapus.php?id_topik=<?php echo $record['id_topik']; ?>">Hapus</a></div>
			<?php 
			}
			?>
			</font><hr>
		     <div id="fotonya">
			 <a href="profil_lain.php?username=<?php echo $record['pengirim']; ?>">
			 <img src="foto/<?php echo $qFoto['foto']; ?>" alt="" width="40" height="35"/></div>
			 <font face="verdana" size="2"><?php echo $record['pengirim']; ?></a></font><hr>
            <font face="verdana" size="2">Judul : <a href="detail_chat.php?id_topik=<?php echo $record['id_topik']; ?>"><?php echo $record['topik']; ?></a></font><br>
		     <font face="verdana" size="2">
			 <?php
				$posting = $record['isi'];
			 							
				echo replace_mesoh($posting);
			?>
			 </font><hr>
            <font face="verdana" size="1">Banyak komentar : <?php echo $record['total_komentar']; ?></font><br>
            

          <?php
		  echo "</div><br>";
//Berhenti Looping 

}
mysql_close();
?>
	</div>
    <br><br>
	<div id ="footer" align="center">
		<br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>