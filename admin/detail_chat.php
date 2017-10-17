
   <?php 
session_start();

if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
	header('location:index.php');
}
if(isset($_SESSION['admin'])){
	$username = $_SESSION['admin'];
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
			<li><a href="member.php">Daftar Member</a></li>
			<li><a href="chat.php">Shoutbox</a></li>
           <li><a href="badword.php">Kelola Badword</a></li>
			<li><a href="logout.php">Keluar</a></li>
		</ul>
	</div>
	Halaman Awal<hr>
	<div align="left">Anda Login Sebagai : Admin</div><br>
    
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
		<img src="foto/<?php echo $query7['foto']; ?>" width="50" height="50" align="left" /> <a href="profil_lain.php?username=<?php echo $query5['pengirim']; ?>"><?php echo $query5['pengirim']; ?></a><br>
       Judul Post : <?php echo $query5['topik']; ?><br><br><hr>
			<?php
				$posting = $query5['isi'];
				$emot=stripslashes(htmlspecialchars($posting));
				$emot = str_replace("jancok","jnck",$emot);
				$emot = str_replace("asu","dog",$emot);
				$emot = str_replace("persetan","prstn",$emot);
				$emot = str_replace("fuck","fak",$emot);
				$emot = str_replace("bitch","beach",$emot);
				$emot = str_replace("asshole","lubang",$emot);
				$emot = str_replace("anjing","anjg",$emot);
				$emot = str_replace("patek","ptk",$emot);
				$emot = str_replace(":)", "<img src=emot/smile.jpg>",$emot);
				$emot = str_replace("B)", "<img src=emot/cool.jpg>",$emot);
				$emot = str_replace(":'(", "<img src=emot/cry.jpg>",$emot);
				$emot = str_replace(":D", "<img src=emot/smile_d.jpg>",$emot);
				$emot = str_replace("0_0", "<img src=emot/hah.jpg>",$emot);
				$emot = str_replace("^_^", "<img src=emot/kiki.jpg>",$emot);
				$emot = str_replace(":*", "<img src=emot/kiss.jpg>",$emot);
				$emot = str_replace(":v", "<img src=emot/pacman.jpg>",$emot);
				$emot = str_replace(":(", "<img src=emot/sad.jpg>",$emot);
				$emot = str_replace(":p", "<img src=emot/tongue.jpg>",$emot);
				$emot = str_replace(":/", "<img src=emot/unsure.jpg>",$emot);
				$emot = str_replace(">.<", "<img src=emot/upset.jpg>",$emot);
				$emot = str_replace(";)", "<img src=emot/wink.jpg>",$emot);
				echo "<br>".$emot;
			?>
</div>
          
          <div align="center"><a href="komentar.php?id_topik=<?php echo $id_topik; ?>">Komentari Posting Ini</a><br />
          </div>
          <hr>Respon untuk <?php echo $query5['topik']; ?>
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
			Tanggal Komentar : <?php echo $rows['tgl_komentar']; ?><br>
                  <?php
                  //Menyesuaikan gambar / avatar
				  $user2 = $rows['penjawab'];
				  $queryAvatar=mysql_fetch_array(mysql_query("select * from member where username='$user2'"));
				  if($queryAvatar==''){
					$queryAvatar=mysql_fetch_array(mysql_query("select * from admin where username='$user2'"));
				  }
				  ?>
                  
                  <a href="profil_lain.php?username=<?php echo  $rows['penjawab']; ?>" ><?php echo $rows['penjawab'];?><img src="foto/<?php echo $queryAvatar['foto']; ?>" alt="" width="50" height="50" align="left" /></a><br>
                    Komentar untuk : <?php echo $rows['topik']; ?><br><br>
                    <hr>
					<?php
						$komen = $rows['isi'];
						$emot=stripslashes(htmlspecialchars($komen));
						$emot = str_replace("jancok","jnck",$emot);
						$emot = str_replace("asu","dog",$emot);
						$emot = str_replace("persetan","prstn",$emot);
						$emot = str_replace("fuck","fak",$emot);
						$emot = str_replace("bitch","beach",$emot);
						$emot = str_replace("asshole","lubang",$emot);
						$emot = str_replace("anjing","anjg",$emot);
						$emot = str_replace("patek","ptk",$emot);
						$emot = str_replace("shit","sit",$emot);
						$emot = str_replace(":)", "<img src=emot/smile.jpg>",$emot);
						$emot = str_replace("B)", "<img src=emot/cool.jpg>",$emot);
						$emot = str_replace(":'(", "<img src=emot/cry.jpg>",$emot);
						$emot = str_replace(":D", "<img src=emot/smile_d.jpg>",$emot);
						$emot = str_replace("0_0", "<img src=emot/hah.jpg>",$emot);
						$emot = str_replace("^_^", "<img src=emot/kiki.jpg>",$emot);
						$emot = str_replace(":*", "<img src=emot/kiss.jpg>",$emot);
						$emot = str_replace(":v", "<img src=emot/pacman.jpg>",$emot);
						$emot = str_replace(":(", "<img src=emot/sad.jpg>",$emot);
						$emot = str_replace(":p", "<img src=emot/tongue.jpg>",$emot);
						$emot = str_replace(":/", "<img src=emot/unsure.jpg>",$emot);
						$emot = str_replace(">.<", "<img src=emot/upset.jpg>",$emot);
						$emot = str_replace(";)", "<img src=emot/wink.jpg>",$emot);
						echo "<br>".$emot;
					?></div>
    <?php
}
?>
	</div>
	<div id ="footer" align="center">
		<br><br><br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>
