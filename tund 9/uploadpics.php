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

if(isset($_POST["submitBtn"])) 
{ 
require ("upload.php");
}
?> 
<!DOCTYPE html>
<html>
<body background="http://img.archiexpo.com/images_ae/photo-g/141377-10636872.jpg">

<form action="upload.php" method="post" enctype="multipart/form-data">
    <p>Find your image:</p>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="submitBtn" value="Upload Image" name="submit">
</form>
<form action="main.php">
<input type="submit" value="Back to main page">
</form>

</body>
</html> 