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



$notice = "";
$target_dir = "../../pics/";
$imageFileType = "";
$timestamp = microtime(1) * 10000;
$imageFileType = $_FILES["fileToUpload"]["name"];
$target_file = $target_dir . pathinfo( basename($_FILES["fileToUpload"]["name"]))["filename"] . "_" . $timestamp . "." . $imageFileType ;
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);



$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$maxWidth = 600;
$maxHeight = 400;


if(!empty($_FILES["fileToUpload"]["name"])){
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		$notice .= "This is not a picture.";
		$uploadOk = 0;
	}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		$notice .= "Sorry, we already have that file.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 2000000) {
		$notice .= "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && 		$imageFileType != "jpeg" && $imageFileType != "gif" ) {
		$notice .= "Your file has to be JPG, JPEG, PNG or GIF.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$notice .= "Sorry, we couldn't upload your image.";
	// if everything is ok, try to upload file
	} else {
		/*if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "Your image ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
		$notice .= "Sorry, something went wrong.";
	}*/
	}
	//muudan pildi suurust
	//lähtudes faili tüübist loome objekti
	if($imageFileType == "jpg" or $imageFileType == "jpeg")
	{
	$myTempImage = imagecreatefromjpeg(($_FILES["fileToUpload"]["tmp_name"]));}
	if($imageFileType == "png" )
	{
	$myTempImage = imagecreatefrompng(($_FILES["fileToUpload"]["tmp_name"]));}
	if($imageFileType == "gif" )
	{
	$myTempImage = imagecreatefromgif(($_FILES["fileToUpload"]["tmp_name"]));}
	
	$imageWidth = imagesx($myTempImage);
	$imageHeight = imagesy($myTempImage);
	$sizeRatio = 1;
	if($imageWidth > $imageHeight){
		$sizeRatio =  $imageWidth / $maxWidth; 
	}else{
	$sizeRatio =  $imageHeight / $maxHeight;	
	}
	$myImage = resize_image($myTempImage, $imageWidth, $imageHeight, round($imageWidth/ $sizeRatio),round($imageHeight/ $sizeRatio));
	
	//save image
	
	if($imageFileType == "jpg" or $imageFileType == "jpeg")
	{
	if(imagejpeg($myImage, $target_file, 90))
	{$notice = "Picture: " . basename($_FILES["fileToUpload"]["name"] . " has been uploaded!");
	}else{$notice ="Sorry, something went wrong!";
		}
	}
	if($imageFileType == "png" )
	{
	if(imagepng($myImage, $target_file, 90)){$notice = "Picture: " . basename($_FILES["fileToUpload"]["name"] . " has been uploaded!");
	}else{$notice ="Sorry, something went wrong!";}
}
	if($imageFileType == "gif" )
	{
	if(imagegif($myImage, $target_file, 90)){$notice = "Picture: " . basename($_FILES["fileToUpload"]["name"] . " has been uploaded!");
	}else{$notice ="Sorry, something went wrong!";}}
	
	
		}else{
		$notice = "Please go back and choose a file! ";
	}
	function resize_image($image, $origW, $origH, $w, $h){
	$dst = imagecreatetruecolor($w,$h);	
	imagecopyresampled($dst, $image, 0, 0, 0, 0, $w, $h, $origW, $origH);	
	return $dst;
	}
?>
<!DOCTYPE html>
<html>
<body background="http://img.archiexpo.com/images_ae/photo-g/141377-10636872.jpg">

<form action="uploadpics.php">
<input type="submit" value="Upload another pic">
<?php
echo $notice;
?>
</form>



</body>
</html> 