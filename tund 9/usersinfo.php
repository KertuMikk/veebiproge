<?php

	require("functions.php");

	//kui pole sisse logitud, liigume login lehele

	if(!isset($_SESSION["userId"])){

		header("Location: login.php");

		exit();

	}

	

	//väljalogimine

	if(isset($_GET["logout"])){

		session_destroy(); //lõpetab sessiooni

		header("Location: login.php");

	}

$tabel = readAllUsers();

?>



<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<title>

		Throney

	</title>

</head>

<body background="http://img.archiexpo.com/images_ae/photo-g/141377-10636872.jpg">

	

	<p>There is absolutely nothing serious here</p>

	<p><a href="?logout=1">Log out</a></p>

	<p><a href="main.php">Main page</a></p>
 


	
		<table width = "1000" border="1" style="border-collapse: collapse;">

		
		<tr>

			<th width="200">First name</th>

			<th width="200">Last name</th>

			<th width="200">email</th>
			<th width="200">Gender</th>
			<th width="200">Birt date</th>

		</tr>

			
	
	

</table>
	


		
<?php echo $tabel;?>
</body>

</html>