
   <?php 
session_start();

if (!isset($_SESSION['member']) || empty($_SESSION['member'])) {
	header('location:index.php');
}
if(isset($_SESSION['member'])){
	$username = $_SESSION['member'];
}

	include "koneksi.php";
	$query=mysql_fetch_array(mysql_query("select * from member where username='$username'"));
	$query2=mysql_fetch_array(mysql_query("select * from topik where pengirim='$username'"));
	$query3 = mysql_query("SELECT * FROM topik");
	$query4 = mysql_query("SELECT * FROM member");
	$jumlah_topik = mysql_num_rows($query3);
	$jumlah_member = mysql_num_rows($query4);

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
	<div align="left">Anda Login Sebagai : <?php  echo $_SESSION['member']; echo " &nbsp;"?></div><br>
    
    <?php 
	$id_topik = $_GET['id_topik'];
	$query5=mysql_fetch_array(mysql_query("select * from topik where id_topik='$id_topik'"));
	
	//mencari gambar pengirim thread
	$username = $query5['pengirim'];
	$query7=mysql_fetch_array(mysql_query("select * from member where username='$username' "));
	if($query7==''){
		$query7=mysql_fetch_array(mysql_query("select * from admin where username='$username'"));
	}
	?>
    <div id="posting">
        Dibuat <?php echo $query5['tanggal']; ?> <br>
		<?php 
			$pengguna=$_SESSION['member'];
			if($pengguna==$username){
		?>
			<div align="right"><a href="proses_hapus.php?id_topik=<?php echo $id_topik; ?>">Hapus</a></div>
		<?php 
			}
		?>
		<a href="profil_lain.php?username=<?php echo $query5['pengirim']; ?>"><img src="foto/<?php echo $query7['foto']; ?>" width="50" height="50" align="left" /> <?php echo $query5['pengirim']; ?></a><br>
       Judul Post : <?php echo $query5['topik']; ?><br><br><hr>
			<?php
			
			$posting = $query5['isi'];
			
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
			
			echo replace_mesoh($posting) . "<br>";
			
			?>
</div>
          <br>
          <div align="center"><a href="komentar.php?id_topik=<?php echo $id_topik; ?>">Komentari Posting Ini</a><br><br>
          </div>
          <hr>Komentar untuk <?php echo $query5['topik']; ?>
            <br><br>
          
            <?php
//
// Menampilkan komentar
$nomor = 2;
$sql2="SELECT * FROM komentar WHERE id_topik='$id_topik' ";
$result2=mysql_query($sql2);
while($rows=mysql_fetch_array($result2)){
?>
			<div id="posting">
                  <?php
                  //Menyesuaikan gambar / avatar
				  $user2 = $rows['penjawab'];
				  $queryAvatar=mysql_fetch_array(mysql_query("select * from member where username='$user2'"));
				  if($queryAvatar==''){
					$queryAvatar=mysql_fetch_array(mysql_query("select * from admin where username='$user2'"));
				  }
				  ?>
                  <a href="profil_lain.php?username=<?php echo  $rows['penjawab']; ?>" ><?php echo $rows['penjawab']; ?><img src="foto/<?php echo $queryAvatar['foto']; ?>" alt="" width="50" height="50" align="left" /></a><br>
				  Tanggal komentar : <?php echo $rows['tgl_komentar']; ?><br>
					<?php
						$komen = $rows['isi'];
						echo replace_mesoh($komen) . "<br>";
					?></div>
    <?php
}
?><br>
	</div>
	<div id ="footer" align="center">
		<br><br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>
