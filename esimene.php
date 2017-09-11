<?php
   //muutujad
   $myName = "Kertu";
   $myNamilyName = "Mikk";
    
	$hourNow = date("H");
	
	$schooldaystart = date("d.m.Y") ."". " 8.15";
  
   $schoolbegin = strtotime ($schooldaystart);
   $timeNow = strtotime ("now");
//echo $hourNow;
//võrdlen kellaaega ja hindan päevaosa ( < > == <=  >=  != )
$partOfDay = "";
$minutesPassed =round(( $timeNow - $schoolbegin )/60);

echo $minutesPassed;


if ($hourNow < 8 and $hourNow > 4 ){
	$partOfDay = "early morning";
	
}
if ($hourNow >= 8 and $hourNow < 16 ){
	$partOfDay = "school time";
}

if ($hourNow >= 16 and $hourNow <23 ){
	$partOfDay = "evening";
}
if ($hourNow >= 23 and $hourNow < 4 ){
	$partOfDay = "night";
}

echo $timeNow - $schoolbegin;
//echo $partOfDay


?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Throney</title>

<link rel="icon" href="https://static.digitecgalaxus.ch/Files/8/1/8/0/7/4/6/person_image_286537.gif" type="GIF">

</head>
<body background="https://cloud.graphicleftovers.com/51202/1515286/back.jpg">
<header>  
 <h1> <font face="Comic Sans MS"
              size="10"
              color= "Ivory"> 
<?php
echo $myName . "". $myFamilyName;
?>
</font>   </h1>
</header>

   <p> <font face="Comic Sans MS" 
             size="3" 
             color= "Ivory">
 See veebileht on loodud õppetöö raames  
 ja ei sisalda tõsiseltvõetavat sisu!  </font>
 </p>


<p>
<img src="https://media.giphy.com/media/LXP19BrVaOOgE/giphy.gif" 
alt="RamseyBolton" height="242" width="350"> 

<img src="https://media.giphy.com/media/Cr7yTbjNuY27C/giphy.gif" 
alt="gollum" height="242" width="350"> 
</p>
<font face="Comic Sans MS"
              size="3"
              color= "Ivory"> 

  <?php
    echo "<p>YOU HAVE NO POWER HERE!!</p>";
	echo "<p>Today is ";
	echo date("d/m/Y") . ", rignt now is " .$partOfDay;
	echo ".</p>";
	echo "<p>page was opened at:" .date("H:i:s") .".</p>";
  ?>
</font>
</body>
</html>



