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



	$picsDir = "../../pics/";

	$picFiles = [];

	$picFileTypes = ["jpg", "jpeg", "png", "gif"];

	

	$allFiles = array_slice(scandir($picsDir), 2);

	

	foreach ($allFiles as $file){

		$fileType = pathinfo($file, PATHINFO_EXTENSION);

		if (in_array($fileType, $picFileTypes) == true){

			array_push($picFiles, $file);

		}

	}

	

	//var_dump($picFiles);

	$fileCount = count($picFiles);

	$picNumber = mt_rand(0, ($fileCount - 1));

	$picFile = $picFiles[$picNumber];

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

	

	<p>There is absolutely nothing serious</p>

	<p><a href="?logout=1">Log out</a></p>

	<p><a href="usersinfo.php">Info about users</a></p>
	<p><a href="userideas.php">Users good ideas</a></p>
	<p><a href="avaleht.php">Main page</a></p>
	<p><a href="uploadpics.php">Place you can upload pictures</a></p>

	<h2>Random pic of an owl for you</h2>

	<img src="<?php echo $picsDir .$picFile; ?>" alt="Tallinna ülikool">

	

</body>

</html>