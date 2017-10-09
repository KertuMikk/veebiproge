<?php

	$database = "if17_mikkkert_2";
require("../../../config.php");
	

	//alustamse sessiooni

	session_start();

	

	function signIn($email, $password){

		$notice = "";

		

		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);

		

		$stmt = $mysqli->prepare("SELECT id, email, password FROM vp2users WHERE email = ?");

		$stmt->bind_param("s", $email);

		$stmt->bind_result($id, $emailFromDb, $passwordFromDb);

		$stmt->execute();

		

		//kui vähemalt üks tulemus

		if ($stmt->fetch()){

			$hash = hash("sha512", $password);

			if($hash == $passwordFromDb){

				$notice = "Sisselogitud!";

				

				//määran sessioonimuutujaid

				$_SESSION["userId"] = $id;

				$_SESSION["userEmail"] = $emailFromDb;

				

				//lähen pealehele

				header("Location: main.php");

				exit();

				

			} else {

				$notice = "Vale salasõna!";

			}

		} else {

			$notice = "Sellise e-postiga kasutajat pole!";

		}

		

		$stmt->close();

		$mysqli->close();

		return $notice;

	}

	

	function signUp($signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword){

		//loome andmebaasiühenduse

		

		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);

		//valmistame ette käsu andmebaasiserverile

		$stmt = $mysqli->prepare("INSERT INTO vp2users (first_name, last_name, birth_date, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");

		echo $mysqli->error;

		//s - string

		//i - integer

		//d - decimal

		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);

		//$stmt->execute();

		if ($stmt->execute()){

			echo "\n Õnnestus!";

		} else {

			echo "\n Tekkis viga : " .$stmt->error;

		}

		$stmt->close();

		$mysqli->close();

	}


	
	
	//hea mõtte salvestamise funktsioon
	
	function saveIdea($idea,$color)
	{
	    $notice="";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt =  $mysqli->prepare("INSERT INTO vp2userideas (userid,idea, ideacolor) VALUES(?,?,?)");
		echo $mysqli->error;
		$stmt-> bind_param("iss",$_SESSION["userId"],$idea,$color);
		if($stmt->execute())
		{
		$notice = "Idea has been saved";	
		}else{
			$notice = "something went wrong!" .$stmt->error;
		}
		$stmt->close();

		$mysqli->close();
		return $notice;
	}
	
	
	
	
	

	//sisestuse kontrollimise funktsioon

	function test_input($data){

		$data = trim($data);//liigsed tühikud, TAB, reavahetuse jms

		$data = stripslashes($data);//eemaldab kaldkriipsud "\"

		$data = htmlspecialchars($data);

		return $data;

	}

	/*

	$x = 7;

	$y = 4;

	echo "Esimene summa on: " .($x + $y) ."\n";

	addValues();

	

	function addValues(){

	echo "Teine summa on: " .($GLOBALS["x"] + $GLOBALS["y"]) ."\n";

		$a = 3;

		$b = 2;

		echo "Kolmas summa on: " .($a + $b) ."\n";

		$x = 1;

		$y = 2;

		echo "Hoopis teine summa on: " .($x + $y) ."\n";

	}

	echo "Neljas summa on: " .($a + $b) ."\n";

	*/

	
?>