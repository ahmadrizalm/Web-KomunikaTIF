
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
	Komentari Posting<hr><br>

    <?php 
	$id_topik = $_GET['id_topik'];
	$query5=mysql_fetch_array(mysql_query("select * from topik where id_topik='$id_topik'"));
		?>
    
     <form id="form1" name="form1" method="post" action="proses_komentar.php">
              <table width="550" border="0">
                <tr>
                  <td colspan="2"><div align="center"></div></td>
                </tr>
                
                <tr>
                  <td>Id Topik</td>
                  <td>:<input name="id_topik" type="text" value="<?php echo $query5['id_topik']; ?>" readonly /></td>
                </tr>
                <tr>
                  <td>Topik</td>
                  <td>:<input name="topik" type="text" id="topik" value="<?php echo $query5['topik']; ?>" readonly /></td>
                </tr>
                <tr>
                  <td>Pembuat Posting</td>
                  <td>:<input name="penjawab" type="text" value="<?php echo $username; ?>" readonly /></td>
                </tr>
                <tr>
                  <td colspan="2"><textarea name="isi" cols="60" rows="8"></textarea></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td width="400"><div align="right">
                    <input name="input" type="submit" value="Komentari" />
                  </div></td>
                </tr>
              </table>
            </form>
	</div>
	<div id ="footer" align="center">
		<br><hr>
       <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>
