<body>
	<?php
		setcookie("exit", "exit", time()+5);
		header("location:index.php");
	?>
</body>