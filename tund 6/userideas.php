<?php

	require("functions.php");
$notice="";
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


	//kas vajutati mõtte salvestamise nuppu
	if(isset($_POST["ideaBtn"]))
	{
	if(isset($_POST["userIdea"])and isset($_POST["ideaColor"])and !empty($_POST["userIdea"]) and !empty ($_POST["ideaColor"]))
	{
		//echo $_POST["ideaColor"];
		//echo $_POST["userIdea"];
		$notice = saveIdea($_POST["userIdea"],$_POST["ideaColor"]);
	}
		
		
	}

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

	<h2>Good ideas</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Good idea: </label>
		<input name="userIdea" type="text">
		<br>
		<label>Color for the idea: </label>
		<input name="ideaColor" type="color">
		<input name="ideaBtn" type="submit" value="Save your idea!">
		<span><?php echo $notice; ?></span>

	</form>

	
	

</body>

</html>