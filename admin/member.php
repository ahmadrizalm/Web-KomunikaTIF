  <?php 

session_start();

if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
	header('location:index.php');
}
if(isset($_SESSION['admin'])){
	$username = $_SESSION['admin'];
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
	Daftar Nama Member<hr><br>
   
	<div id="memberlain">
	<table width="700" border="0">
    <tr>
      <td><div align="center">
          <div align="center" style="width:750px;">
            <table width="100%" border="0">
              <tr>
                <td width="40">#</td>
                <td width="70">Avatar</td>
                <td width="250">Nama Lengkap</td>
                <td width="100">Username</td>
                <td width="120">Jenis Kelamin</td>
                <td width="125">Member Sejak</td>
                <td width="80">Fungsi</td>
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
                <td width="40"><font face="verdana" size="2"><?php echo $nomor++; ?></font></td>
                <td width="70"><strong><img src="foto/<?php echo $record['foto']; ?>" alt="" width="40" height="35"/></strong></td>
                <td width="250"><font face="verdana" size="2"><a href="profil_lain.php?username=<?php echo $record['username']; ?>"><?php echo $record['nama']; ?></a></font></td>
                <td width="100"><font face="verdana" size="2"><?php echo $record['username']; ?></font></td>
                <td width="120"><font face="verdana" size="2"><?php echo $record['jenis_kelamin']; ?></font>
                <td width="125"><font face="verdana" size="2"><?php echo $record['tgl_daftar']; ?></font></td>
                <td width="80"><font face="verdana" size="2"><a href="proses_delete.php?uname=<?php echo $record['username']; ?>">Hapus</a></font></td>
              </tr>
              <?php //Berhenti Looping 
}
mysql_close();
?>
            </table></table>
	</div>
	<br>
	<div align="center"><a href="daftar.php"> Tambah Member </a></div><br></div>
	</div>
	
</body>
<div id ="footer" align="center">
		<br><br><br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</html>
 