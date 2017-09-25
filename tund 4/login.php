<?php
require("../../../config.php");
//echo $serverHost;
	$loginEmail = "";

	
	
	$signupFirstName = "";

	$signupFamilyName = "";

	$signupEmail = "";

	$gender = "";

	$signupBirthDay = null;

	$signupBirthMonth = null;

	$signupBirthYear = null;
$signupBirthDate = null;
	

$signupFirstNameError = "";

	$signupFamilyNameError = "";

	$signupBirthDayError = "";

	$signupGenderError = "";

	$signupEmailError = "";

	$signupPasswordError = "";
	
	
	

	


	

	//kas on kasutajanimi sisestatud

	if (isset ($_POST["loginEmail"])){

		if (empty ($_POST["loginEmail"])){

			$loginEmailError ="You need that to log in!";

		} else {

			$loginEmail = $_POST["loginEmail"];

		}

	}

	

	//kontrollime, kas kirjutati eesnimi

	if (isset ($_POST["signupFirstName"])){

		if (empty ($_POST["signupFirstName"])){

			$signupFirstNameError ="You MUST type that!";

		} else {

			$signupFirstName = $_POST["signupFirstName"];

		}

	}

	

	//kontrollime, kas kirjutati perekonnanimi

	if (isset ($_POST["signupFamilyName"])){

		if (empty ($_POST["signupFamilyName"])){

			$signupFamilyNameError ="You MUST type that!";

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
	
	
	if(isset($_POST["signupBirthMonth"]) and isset ($_POST["signupBirthDay"]) and isset ($_POST["signupBirthYear"]))
	{ 
		//kontrollin kuupäeva kehtivust
		if(checkdate(intval($_POST["signupBirthMonth"]),intval($_POST["signupBirthDay"]),intval($_POST["signupBirthYear"])))
			
			{
				$birthDate = date_create(intval($_POST["signupBirthMonth"]). "/" . intval($_POST["signupBirthDay"]) ."/" . intval($_POST["signupBirthYear"]));
				$signupBirthDate = date_format($birthDate, "Y-m-d");
				echo $signupBirthDate;
	} else {
		$signupBirthDayError .= "Date is not valid, try again ";
		
		
	}
		
		
		
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

	
	
	
	
	
	
	//UUS KASUTAJA ANDMEBAAS
	
	
	if(empty($signupFirstNameError) and empty($signupFamilyNameError) and empty ($signupBirthDayError) and empty ($signupGenderError) and empty ($signupEmailError) and empty ($signupPasswordError))
	{
		echo "Let's begin! \n";
		
		
		$signupPassword = hash("sha512", $_POST["signupPassword"]);
		//echo $signupPassword;
		
		//ühendus serveriga
		$database = "if17_mikkkert_2";
		$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
		//käsk andmebaasile
		$stmt =$mysqli->prepare("INSERT INTO vp2users (first_name, last_name, birth_date, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		echo $mysqli->error;
		//s-string(tekst) i_integrer(täisarv) d-decimal(ujukomaarv)
		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
		//$stmt->execute();
		if($stmt->execute())
		{
		echo"DoNe!";	
			
			
		}else{
			echo "oops something went wrong :( " .$stmt->error;
			
		}
		
		
		
		
		
		
		
		
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

		<input name="loginEmail" type="email" value="<?php echo $loginEmail; ?>" >

		<br><br>

		<input name="loginPassword" placeholder="Password" type="password">

		<br><br>

		<input type="submit" value="Logi sisse">

	</form>

	

	<h1>Sign up</h1>

	<p>If you still don't have user....</p>

	

	<form method="POST">

		<label>First name </label>

		<input name="signupFirstName" type="text" value="<?php echo $signupFirstName; ?>">
<span><?php echo $signupFirstNameError ; ?> </span>
		<br>

		<label>Family name </label>

		<input name="signupFamilyName" type="text" value="<?php echo $signupFamilyName; ?>">
		
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

		<input name="signupEmail" type="email" value="<?php echo $signupEmail; ?>">

		<br><br>

		<input name="signupPassword" placeholder="Password" type="password">

		<br><br>



		

		<input type="submit" value="Loo kasutaja">

	</form>

		

</body>

</html>