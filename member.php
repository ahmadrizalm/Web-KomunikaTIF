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
	Daftar Nama Member<hr><br>
    Anda Login Sebagai : <?php  echo $_SESSION['member']; ?><br><br>
   <div id="memberlain">
	 <table width="700" border="0">
    <tr>
      <td><div align="center">
          <div align="center" style="overflow:auto; width:750px;">
            <table width="100%" border="0">
              <tr>
                <td width="40">#</td>
                <td width="70">Avatar</td>
                <td width="240">Nama Lengkap</td>
                <td width="100">Username</td>
                <td width="120">Jenis Kelamin</td>
                <td width="100">Member Sejak</td>
              </tr>
			  </table>
			  <hr>
              <?php

$nomor = 1;

include "koneksi.php";
$sql = "SELECT * FROM member ORDER by nama";
$hasil=mysql_query($sql,$koneksi);
while($record=mysql_fetch_array($hasil)){ 

?>
			<table width="100%" border="0">
              <tr>
                <td width="40">&nbsp;<font face="verdana" size="2"><?php echo $nomor++; ?></font></td>
                <td width="70"><strong><img src="foto/<?php echo $record['foto']; ?>" alt="" width="40" height="35"/></strong></td>
                <td width="240">&nbsp;<font face="verdana" size="2"><a href="profil_lain.php?username=<?php echo $record['username']; ?>"><?php echo $record['nama']; ?></a></font></td>
                <td width="100"><font face="verdana" size="2"><?php echo $record['username']; ?></font></td>
                <td width="120"><font face="verdana" size="2"><?php echo $record['jenis_kelamin']; ?></font>
                <td width="100"><font face="verdana" size="2"><?php echo $record['tgl_daftar']; ?></font></td>
              </tr>
              <?php
//Berhenti Looping 
}
mysql_close();
?>
              </table></table></div><br>
	</div></div><br><br>
	<div id ="footer" align="center">
		<br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>
 