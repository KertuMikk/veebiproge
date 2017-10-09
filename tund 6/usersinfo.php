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

<body background="https://www.muralswallpaper.co.uk/app/uploads/pattern-clouds-pink-and-grey-nursery-plain-820x532.jpg">

	

	<p>There is absolutely nothing serious here</p>

	<p><a href="?logout=1">Log out</a></p>

	<p><a href="main.php">Main page</a></p>

	<?php
	echo $first_name;
	echo $last_name;
	echo $email;
	
	?>

	<table border="1" style="border-collapse: collapse;">

		
		<tr>

			<th>First name</th>

			<th>Last name</th>

			<th>username</th>

		</tr>

		<tr>

			<td>Kertu</td>

			<td>Mikk</td>

			<td>kertumik@tlu.ee</td>

		</tr>

		<tr>

			<td>Mari</td>

			<td>Karus</td>

			<td>kasrusmari@aed.ee</td>

		</tr>

	

	</table>

	

</body>

</html>