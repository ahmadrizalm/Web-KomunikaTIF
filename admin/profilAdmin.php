
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
    Profil Saya<hr>
	<br>
	<div align="center">
        <div align="center">
          <table width="552" border="0">
            <tr>
              <td width="150" height="152" valign="top">
					<div align="center">
					<img src="foto/admin.jpg" width="150" height="150" />
					</div>
				</td>
              <td width="392" valign="top"><table width="395" border="0">
                <tr>
                  <td></td>
					<td></td>
                </tr>
                <tr>
                  <td></td>
				   <td></td>
                </tr>
                <tr>
                  <td>Nama Lengkap</td>
                  <td>: Admin Kece</td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td>: admin</td>
                </tr>
                <tr>
                  <td>Email</td>
                    <td>: <a href="mailto:admin@komunikatif.com">admin@komunikatif.com</a> </td>
                </tr>
                <tr>
                  <td>Terdaftar Sejak</td>
                  <td>: Sejak Dahulu Kala</td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>: Undefined - 404 Not Found</td>
                </tr>
                <tr>
                  <td>Total Post</td>
                  <td>: 
                  <?php 
				  //Mencari total post dari masing2 user
				  
				  //$total_post = mysql_num_rows(mysql_query("SELECT * FROM tabel_topik WHERE pengirim = '$username'"));
				  //echo "$total_post";
				  //?>
                  </strong></td>
                </tr>
              </table></td>
            </tr>
          </table>
    <br><br>
      </div>
      </div>
	
	</div>
<br><br>
	<div id ="footer" align="center">
		<br><hr>
        <a href="about.php">Copyright - ABADI Corporation 2015</a>
    </div>
</body>
</html>