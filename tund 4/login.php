<?php
	$loginEmail = "";

	
	
	$signupFirstName = "";

	$signupFamilyName = "";

	$signupEmail = "";

	$gender = "";

	$signupBirthDay = null;

	$signupBirthMonth = null;

	$signupBirthYear = null;

	

$signupFirstNameError = "";

	$signupFamilyNameError = "";

	$signupBirthDayError = "";

	$signupGenderError = "";

	$signupEmailError = "";

	$signupPasswordError = "";
	
	
	
	
	


	

	//kas on kasutajanimi sisestatud

	if (isset ($_POST["loginEmail"])){

		if (empty ($_POST["loginEmail"])){

			//$loginEmailError ="NB! Ilma selleta ei saa sisse logida!";

		} else {

			$loginEmail = $_POST["loginEmail"];

		}

	}

	

	//kontrollime, kas kirjutati eesnimi

	if (isset ($_POST["signupFirstName"])){

		if (empty ($_POST["signupFirstName"])){

			//$signupFirstNameError ="NB! Väli on kohustuslik!";

		} else {

			$signupFirstName = $_POST["signupFirstName"];

		}

	}

	

	//kontrollime, kas kirjutati perekonnanimi

	if (isset ($_POST["signupFamilyName"])){

		if (empty ($_POST["signupFamilyName"])){

			//$signupFamilyNameError ="NB! Väli on kohustuslik!";

		} else {

			$signupFamilyName = $_POST["signupFamilyName"];

		}

	}
	//kas sünnikuu on valitud
if (isset($_POST["signupBirthMonth"]))
{
	$signupBirthMonth = intval($_POST["signupBirthMonth"]);
	
	
}
	//kas sünnikuupäev on
	if (isset ($_POST["signupBirthDay"])){

		$signupBirthDay = $_POST["signupBirthDay"];

		//echo $signupBirthDay;

	}

		//kas sünniaasta on

	if (isset ($_POST["signupBirthYear"])){

		$signupBirthYear = $_POST["signupBirthYear"];

		//echo $signupBirthYear;

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	//kontrollime, kas kirjutati kasutajanimeks email

	if (isset ($_POST["signupEmail"])){

		if (empty ($_POST["signupEmail"])){

			//$signupEmailError ="NB! Väli on kohustuslik!";

		} else {

			$signupEmail = $_POST["signupEmail"];

		}

	}

	
	
	
	
	
	if (isset ($_POST["signupPassword"])){

		if (empty ($_POST["signupPassword"])){

			//$signupPasswordError = "NB! Väli on kohustuslik!";

		} else {

			//polnud tühi

			if (strlen($_POST["signupPassword"]) < 8){

				//$signupPasswordError = "NB! Liiga lühike salasõna, vaja vähemalt 8 tähemärki!";

			}

		}

	}

	

	if (isset($_POST["gender"]) && !empty($_POST["gender"])){ //kui on määratud ja pole tühi

			$gender = intval($_POST["gender"]);

		} else {

			//$signupGenderError = " (Palun vali sobiv!) Määramata!";

	}

	
//Tekitame aasta valiku

	$signupYearSelectHTML = "";

	$signupYearSelectHTML .= '<select name="signupBirthYear">' ."\n";

	$signupYearSelectHTML .= '<option value="" selected disabled>aasta</option>' ."\n";

	$yearNow = date("Y");

	for ($i = $yearNow; $i > 1900; $i --){

		if($i == $signupBirthYear){

			$signupYearSelectHTML .= '<option value="' .$i .'" selected>' .$i .'</option>' ."\n";

		} else {

			$signupYearSelectHTML .= '<option value="' .$i .'">' .$i .'</option>' ."\n";

		}

		

	}

	$signupYearSelectHTML.= "</select> \n";	
	
	
	
	//Tekitame kuupäeva valiku

	$signupDaySelectHTML = "";

	$signupDaySelectHTML .= '<select name="signupBirthDay">' ."\n";

	$signupDaySelectHTML .= '<option value="" selected disabled>päev</option>' ."\n";

	for ($i = 1; $i < 32; $i ++){

		if($i == $signupBirthDay){

			$signupDaySelectHTML .= '<option value="' .$i .'" selected>' .$i .'</option>' ."\n";

		} else {

			$signupDaySelectHTML .= '<option value="' .$i .'">' .$i .'</option>' ." \n";

		}

		

	}

	$signupDaySelectHTML.= "</select> \n";
	
	
//tekitame sünnikuu valiku 

$monthNamesEt = ["jaanuar","veebruar","märts","aprill","mai","juuni","juuli","august","september","oktoober","november","detsember"];
$signupMonthSelectHTML = "";
$signupMonthSelectHTML .= '<select name= "signupBirthMonth">' . "\n";  
//\n ei tööta ilma jutumärkideta
$signupMonthSelectHTML .= '<option value = "" selected disabled>kuu</option>' . "\n";


foreach ($monthNamesEt as $key=>$month)
{
	if($key + 1 === $signupBirthMonth)
	{
		$signupMonthSelectHTML .='<option value = "' .($key + 1) .'"selected>' .$month ."</option> \n";
		
	} else
	{
		$signupMonthSelectHTML .='<option value = "' .($key + 1) .'">' .$month ."</option> \n";
		
	}
//$signupMonthSelectHTML .='<option value = "' .($key + 1) .'">' .$month ."</option> \n";
	
}
$signupMonthSelectHTML .= "</select> \n";







?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">
 <title>Log in or sign up</title>

<link rel="icon" href="https://static.digitecgalaxus.ch/Files/8/1/8/0/7/4/6/person_image_286537.gif" type="GIF">

</head>

<body background="https://www.muralswallpaper.co.uk/app/uploads/pattern-clouds-pink-and-grey-nursery-plain-820x532.jpg">

	<h1>Log in!</h1>

	<p>Siin harjutame sisselogimise funktsionaalsust.</p>

	

	<form method="POST">

		<label>Username (Email): </label>

		<input name="loginEmail" type="email" value="<?php echo $loginEmail; ?>" required>

		<br><br>

		<input name="loginPassword" placeholder="Password" type="password"required>

		<br><br>

		<input type="submit" value="Logi sisse">

	</form>

	

	<h1>Sign up</h1>

	<p>If you still don't have user....</p>

	

	<form method="POST">

		<label>First name </label>

		<input name="signupFirstName" type="text" value="<?php echo $signupFirstName; ?>"required>

		<br>

		<label>Family name </label>

		<input name="signupFamilyName" type="text" value="<?php echo $signupFamilyName; ?>"required>
<br>
<label>Your birth date</label>
<?php
echo $signupMonthSelectHTML . $signupDaySelectHTML .$signupYearSelectHTML


?>

		<br><br>

		<label>Gender</label><span>

		<br>

		<input type="radio" name="gender" value="1" <?php if ($gender == '1') {echo 'checked';} ?>><label>Male</label> <!-- Kõik läbi POST'i on string!!! -->

		<input type="radio" name="gender" value="2" <?php if ($gender == '2') {echo 'checked';} ?>><label>Female</label>

		<br><br>

		

		<label>Username (Email)</label>

		<input name="signupEmail" type="email" value="<?php echo $signupEmail; ?>"required>

		<br><br>

		<input name="signupPassword" placeholder="Password" type="password"required>

		<br><br>



		

		<input type="submit" value="Loo kasutaja">

	</form>

		

</body>

</html>