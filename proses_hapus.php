
	<?php
		include"koneksi.php";

		$topik = $_GET['id_topik'];
		$query = mysql_query("delete from topik where id_topik=$topik");
		
		if($query){
			echo "<script> alert('Posting telah dihapus!'); location = 'home.php'; </script>";
		}
		else {
			echo "<script> alert('Posting gagal dihapus!'); location = 'home.php'; </script>";
	    }	
	?>
	
	
