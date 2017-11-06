<?php

	require("functions.php");
	require("edituserideafunctions.php");
$notice="";
$ideas = "";
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
	
	//uuendamise nupu vajutamisel
if(isset($_POST["ideaBtn"])){
	updateIdea($_POST["id"], test_input($_POST["userIdea"]),test_input( $_POST["ideaColor"]));
//header("Location: ?id=" . $_POST["id"]); samale lehele tagasi

	}
	
	
if(isset($_GET["delete"])){
deleteIdea($_GET["id"]);	
header("Location: userideas.php" );
exit();
}

$idea = getSingleIdea($_GET["id"]);
?>



<!DOCTYPE html>

<html>

<head>
<style>
body {
    color: #6680CC;
}
</style>
	<meta charset="utf-8">

	<title>

		Edit ideas

	</title>

</head>

<body background="http://img.archiexpo.com/images_ae/photo-g/141377-10636872.jpg">

	

	<p>There is absolutely nothing serious here</p>

	<p><a href="?logout=1">Log out</a></p>

	<p><a href="userideas.php">Back to idea page</a></p>

	<h2>Edit your idea</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<input name="id" type="hidden" value="<?php echo $_GET["id"]; ?>">
		<label>Good idea: </label>
		<textarea name="userIdea" > <?php echo $idea->text; ?></textarea>
		<br>
		<label>Color for the idea: </label>
		<input name="ideaColor" type="color" value="<?php echo $idea->color; ?>" >
		<input name="ideaBtn" type="submit" value="Save your idea!">
		<span><?php echo $notice; ?></span>
<p> <a href="?id=<?=$_GET["id"]; ?>&delete=true">Delete that bad idea!</a></p>
	</form>

	
	

</body>

</html>