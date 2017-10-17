
   <?php 
session_start();

if (!isset($_SESSION['member']) || empty($_SESSION['member'])) {
	header('location:index.php');
}
if(isset($_SESSION['member'])){
	$username = $_SESSION['member'];
}
//Mengambil nama informasi user
	include "koneksi.php";
	$user=$username;
	$query=mysql_fetch_array(mysql_query("select * from member where username='$user'"));
	$nama 	         = $query['nama'];
	$namauser 		 = $query['username'];
	$email 			 = $query['email'];
	$tanggal_daftar   = $query['tgl_daftar'];
	$jenis_kelamin    = $query['jenis_kelamin'];
	$avatar		   = $query['foto'];
	

?>

<head>
	 <link rel="stylesheet" href="css/home.css" />
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
            <li><a href="memberlain.php">Member Lain</a></li>
			<li><a href="logout.php">Keluar</a></li>
		</ul>
	</div>
	
	Edit Profil<hr><br>
	
	<div align="center">
        <div align="center">
        <form action="update_profil.php" method="POST" enctype="multipart/form-data">
	
          <table width="600" border="0">
            <tr>
              <td width="150" height="152" align="top"><div align="center"><img src="foto/<?php echo $avatar ?>" width="150" height="150" />      		  
			 <input type="file" name="gambar"/>           
              
              </div></td>
              <td><table width="395" border="0">
                <tr>
                  <td colspan="2"><div align="center"></div></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="center"></div></td>
                </tr>
                 <tr>
                  <td>Username</td>
                  <td> : <input name="username" type="text" value="<?php echo $username ?>" readonly/> *</td>
                </tr>
                <tr>
                  <td>Nama Lengkap</td>
                  <td>: <input name="nama" type="text" value="<?php echo $nama ?>" /> </td>
                </tr>
					<tr>
                  <td>Email</td>
                  <td>: <input name="nama" type="text" value="<?php echo $email ?>" /> </td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                   <td>:<input type="radio" name="gender"  value="Laki-Laki" <?php if($jenis_kelamin=='Laki-Laki'){echo 'checked';}?>>Laki-Laki</td>
				   </tr>
			      <tr>
				  <td></td>
				  <td>:<input type="radio" name="gender" value="Perempuan"<?php if($jenis_kelamin=='Perempuan'){echo 'checked';}?>>Perempuan</td>
                </tr>
                <tr>
                  <td>Total Post</td>
                  <td>: 
                  <?php 
				  //Mencari total post dari masing2 user
				  
				  //$total_post = mysql_num_rows(mysql_query("SELECT * FROM tabel_topik WHERE pengirim = '$username'"));
				  //echo "$total_post";
				  //
				  ?>
                  
                  
                  </td>
                </tr>
                 <tr>
                    <td>&nbsp;</td>
                    <td></td>
                  </tr>
              </table></td>
            </tr>
          </table>
		  <input type="submit" name="button" id="button" value="Submit" />
          </form>
      </div>
      </div>
	
	</div>
	<div id ="footer" align="center">
		<br><hr>
        <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>