<?php

	require("functions.php");
	require("classes/Photoupload.class.php");
	$notice = "";

	/*$joke =  new Photoupload("Väga sajalane värk!");
	echo $joke->testpublic;
	echo $joke->testprivate;*/

	//kui pole sisseloginud, siis sisselogimise lehele

	if(!isset($_SESSION["userId"])){

		header("Location: login.php");

		exit();

	}

	

	//kui logib välja

	if (isset($_GET["logout"])){

		//lõpetame sessiooni

		session_destroy();

		header("Location: login.php");

	}

	

	//Algab foto laadimise osa

	$target_dir = "../../pics2/";

	$target_file = "";

	$uploadOk = 1;

	$imageFileType = "";

	$maxWidth = 600;

	$maxHeight = 400;

	$marginVer = 10;

	$marginHor = 10;

	

	//Kas vajutati üleslaadimise nuppu

	if(isset($_POST["submit"])) {

		

		if(!empty($_FILES["fileToUpload"]["name"])){

			

			//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

			$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]))["extension"]);

			$timeStamp = microtime(1) *10000;

			/* $target_file = $target_dir . pathinfo(basename($_FILES["fileToUpload"]["name"]))["filename"] ."_" .$timeStamp ."." .$imageFileType; */

		$target_file = "hmv_" .$timeStamp ."." .$imageFileType;

			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

			if($check !== false) {

				$notice .= "Fail on pilt - " . $check["mime"] . ". ";

				$uploadOk = 1;

			} else {

				$notice .= "See pole pildifail. ";

				$uploadOk = 0;

			}

		

			//Kas selline pilt on juba üles laetud

			if (file_exists($target_file)) {

				$notice .= "Kahjuks on selle nimega pilt juba olemas. ";

				$uploadOk = 0;

			}

			/* //Piirame faili suuruse

			if ($_FILES["fileToUpload"]["size"] > 2000000) {

				$notice .= "Pilt on liiga suur! ";

				$uploadOk = 0;

			}
 */
			

			//Piirame failitüüpe

			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

				$notice .= "Vabandust, vaid jpg, jpeg, png ja gif failid on lubatud! ";

				$uploadOk = 0;

			}

			

			//Kas saab laadida?

			if ($uploadOk == 0) {

				$notice .= "Vabandust, pilti ei laetud üles! ";

			//Kui saab üles laadida

			} else {		

				
				
				//kasutame klasse
				
				
				$myPhoto = new Photoupload($_FILES["fileToUpload"]["tmp_name"], $imageFileType);
				$myPhoto->readExif();
				$myPhoto->resizeImage($maxWidth, $maxHeight);
				$myPhoto->addWatermark($marginHor, $marginVer);
				//$myPhoto->addTextWatermark($myPhoto->exifToImage);
				
				$myPhoto->addTextWatermark("hmv_photo");
				$myPhoto->savePhoto($target_dir, $target_file);
				$myPhoto->clearImages();
				unset($myPhoto);
				/* $notice = $myPhoto->savePhoto($target_dir, $target_file);
				if($notice == "true"){
					$notice = "Picture uploaded";
				}else{
					$notice = "Picture not uploaded";
				} */

				
				
				
				
				

			}

		

		} else {

			$notice = "Palun valige kõigepealt pildifail!";

		}//kas faili nimi on olemas lõppeb

	}//kas üles laadida lõppeb

	

require("header.php");

?>



<script type="text/javascript" src="javascript/checkFileSize.js" defer ></script>

</head>

<body background="http://img.archiexpo.com/images_ae/photo-g/141377-10636872.jpg">

	<h1>Pictures</h1>

	

	<p><a href="?logout=1">Log out</a>!</p>

	<p><a href="main.php">Back to main page</a></p>

	<hr>

	<h2>Upload photo</h2>

	<form action="photoupload.php" method="post" enctype="multipart/form-data">

		<label>Choose your photo:</label>

		<input type="file" name="fileToUpload" id="fileToUpload">

		<input type="submit" value="Upload" name="submit" id="photoSubmit"><span id="fileSizeError"></span>

	</form>

	

	<span><?php echo $notice; ?></span>

	<hr>

<?php
	require("footer.php")
	
	?>
