<?php
$database = "if17_rinde";

require("../../config.php");
$FirstNameError ="";
$firstname ="";
$LastNameError ="";
$lastname ="";
$keel="";
$jaanuar="";
$veebruar="";
$märts=""; 
$aprill="";
$mai="";
$juuni="";
$juuli="";
$august="";
$september="";
$oktoober="";
$november="";
$detsember="";
$notice="";


/*$LanguageHTML = "";

	$Languages = ["Afrikaani", "Albaania", "Baski", "Bosna", "Friisi", "Galeegi", "Haitikreooli", "Havai", "Hispaania", "Hollandi", "Horvaadi", "Iiri", "Indoneesi", "Inglise", "Itaalia", "Katalaani", "Korsika", "Ladina", "Leedu", "Letseburgi", "Läti", "Malagassi", "Maoori", "Norra","Poola", "Portugali", "Prantsuse", "Rootsi", "Rumeenia", "Saksa", "Slovaki", "Sloveeni", "Soome", "Šoti", "Taani", "Tšehhi","Türgi", "Uelsi", "Ungari", "Usbeki"];

	$LanguageHTML .= '<select name="Language">' ."\n";

	$LanguageHTML .= '<option value="" selected disabled>keel</option>' ."\n";

	foreach ($Languages as $key=>$lang){

		

		$LanguageHTML .= '<option value="' .($key + 1) .'">' .$lang .'</option>' ."\n";

		
		
	}

	$LanguageHTML .= "</select> \n";*/

	
	
	if(isset($_POST["submit"])){


	if (isset ($_POST["keel"]) and isset ($_POST["jaanuar"]) and isset ($_POST["veebruar"]) and isset ($_POST["märts"]) and isset ($_POST["aprill"]) and isset ($_POST["juuni"]) and isset ($_POST["juuli"]) and isset ($_POST["august"]) and isset ($_POST["september"]) and isset ($_POST["oktoober"]) and isset ($_POST["november"]) and isset ($_POST["detsember"]) and isset ($_POST["firstname"]) and isset ($_POST["lastname"]) and !empty ($_POST["keel"]) and !empty ($_POST["jaanuar"]) and !empty ($_POST["veebruar"]) and !empty ($_POST["märts"]) and !empty ($_POST["aprill"]) and !empty ($_POST["juuni"]) and !empty ($_POST["juuli"]) and !empty ($_POST["august"]) and !empty ($_POST["september"]) and !empty ($_POST["oktoober"]) and !empty ($_POST["november"]) and !empty ($_POST["detsember"]) and !empty ($_POST["firstname"]) and !empty ($_POST["lastname"]))
	{

		$notice = Lisa(($_POST["firstname"]) , ($_POST["lastname"]) , ($_POST["keel"]) , ($_POST["jaanuar"]) , ($_POST["veebruar"]) , ($_POST["märts"]) , ($_POST["aprill"]), ($_POST["juuni"]) , ($_POST["juuli"]) , ($_POST["august"]) , ($_POST["september"]) , ($_POST["oktoober"]) , ($_POST["november"]), ($_POST["detsember"]));
		
		
		//Lisa($firstname, $lastname, $keel, $jaanuar, $veebruar, $märts, $aprill, $mai, $juuni, $juuli, $august, $september, $oktoober, $november, $detsember);

	

	
	}
	}
	
	function Lisa( $firstname, $lastname, $keel, $jaanuar, $veebruar, $märts, $aprill, $mai, $juuni, $juuli, $august, $september, $oktoober, $november, $detsember){

		

		

		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);

	

		$stmt = $mysqli->prepare("INSERT INTO vptestmonths (firstname, lastname, language, january, february, march, april, may, june, july, august, september, october, november, december ) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?,? ,?)");


		echo $mysqli->error;

		

		$stmt->bind_param("sssssssssssssss",$firstname, $lastname,$keel, $jaanuar, $veebruar, $märts, $aprill, $mai, $juuni, $juuli, $august, $september, $oktoober, $november, $detsember);

		

		if ($stmt->execute()){

			$notice = "Idea has been saved";

		} else {

			$notice = "something went wrong!" .$stmt->error;

		}

		$stmt->close();

		$mysqli->close();
return $notice;
	}
	
	
	
?>
<!DOCTYPE html>

<html lang="et">

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

		<label>Eesnimi</label>

		<input name="firstname" type="text" >
		<label>Perekonnanimi</label>

		<input name="lastname" type="text" >
		
<label>keel</label>

		<input name="keel" type="text" >


<br>
<br>
<label>Jaanuar</label>

		<input name="jaanuar" type="text" >

<br>
<br>
<label>Veebruar</label>

		<input name="veebruar" type="text" >

<br>
<br>
<label>Märts</label>

		<input name="märts" type="text" >

<br>
<br>
<label>Aprill</label>

		<input name="aprill" type="text" >

<br>
<br>
<label>Mai</label>

		<input name="mai" type="text" >

<br>
<br>

<label>Juuni</label>

		<input name="juuni" type="text" >

<br>
<br>
<label>Juuli</label>

		<input name="juuli" type="text" >

<br>
<br>
<label>August</label>

		<input name="august" type="text" >

<br>
<br>
<label>September</label>

		<input name="september" type="text" >

<br>
<br>
<label>Oktoober</label>

		<input name="oktoober" type="text" >

<br>
<br>
<label>November</label>

		<input name="november" type="text" >

<br>
<br>
<label>Detsember</label>

		<input name="detsember" type="text" >

<br>
<br>
<input name="submit" type="submit" value="Kinnita oma valikud">
<?php echo $notice ?>
</form>








</html>