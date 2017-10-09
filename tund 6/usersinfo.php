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

$email = readAllUsers();

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



	
		<table width = "300" border="1" style="border-collapse: collapse;">

		
		<tr>

			<th width="100">First name</th>

			<th width="100">Last name</th>

			<th width="100">email</th>

		</tr>

			
	
	

</table>
	


		
<?php echo $email;?>
</body>

</html>