<?php 
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
	//redirect ke halaman login
	header('location:index.php');
}
?>
<html>
<head>
	<title>KomunikaTIF</title>
    <link rel="stylesheet" href="../css/home.css" />

</head>
<body>
	<img src="../gambar/ilkom.gif"><img src="../gambar/filkom.png" align="right">
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
	Halaman Awal<hr><br>

          <?php

include 'koneksi.php';
$nomor = 1;
$sql = "SELECT * FROM topik ORDER by tanggal DESC";
$hasil=mysql_query($sql,$koneksi);
while($record=mysql_fetch_array($hasil)){ 
$nama=$record['pengirim'];
	$qFoto=mysql_fetch_array(mysql_query("select * from member where username='$nama' "));
	if($qFoto==''){
		$qFoto=mysql_fetch_array(mysql_query("select * from admin where username='$nama'"));
	 }
echo "<div id='posting'>";
?>
         <font face="verdana" size="2">#<?php echo $nomor++; ?> -> <?php echo $record['tanggal']; ?>
		  <div align="right"><a href="proses_hapus.php?id_topik=<?php echo $record['id_topik']; ?>">Hapus</a></div></font>
		  <hr>
		     <div id="fotonya"><a href="profil_lain.php?username=<?php echo $record['pengirim']; ?>"><img src="foto/<?php echo $qFoto['foto']; ?>" alt="" width="40" height="35"/></div>
			 <font face="verdana" size="2"><?php echo $record['pengirim']; ?></a></font><hr>
            <font face="verdana" size="2">Judul : <a href="detail_chat.php?id_topik=<?php echo $record['id_topik']; ?>"><?php echo $record['topik']; ?></a></font><br>
		     <font face="verdana" size="2"><?php echo $record['isi']; ?></font><hr>
            <font face="verdana" size="1">Banyak komentar : <?php echo $record['total_komentar']; ?></font><br>
          <?php
		  echo "</div><br>";
//Berhenti Looping 
}
mysql_close();
?>
        </table>
	
	</div>
	<div id ="footer" align="center">
		<br><br><br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>