<?php
   //muutujad
   $myName = "Kertu";
   $myNamilyName = "Mikk";
    
	$hourNow = date("H");
	$partOfDay = "";




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

//echo $timeNow - $schoolbegin;
//echo $partOfDay
 
 
 $monthNamesEt = ["jaanuar","veebruar","märts","aprill","mai","juuni","juuli","august","september","oktoober","november","detsember"];
//var_dump ($monthNamesEt);
//echo $monthNamesEt[3];

$monthNow = $monthNamesEt[date("n") - 1];
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
  echo $myName." ".$myNamilyName;
?>
</font>   </h1>
</header>

   <p> <font face="Comic Sans MS" 
             size="3" 
             color= "Ivory">
 See veebileht on loodud õppetöö raames  
 ja ei sisalda tõsiseltvõetavat sisu!
 <?php
    echo "<p>YOU HAVE NO POWER HERE!!</p>";
	echo "<p>Today is ";
	echo date("d/") .$monthNow .date("/Y") . ", rignt now is " .$partOfDay;
	echo ".</p>";
	echo "<p>page was opened at:" .date("H:i:s") .".</p>";
  ?> 
<h2> Aaaand few links for you </h2>
<p>I study at <a href=https://www.tlu.ee/>Tallinn UNI</a> </p>
<p>And <a href="../esimene.php">this </a>is my first precious </p>
<p>And <a href="../../../~masijoon/veebiprogrammeerimine/esimene.php">this </a>is my friends first precious </p>
<p>Picture from uni <a href=foto.php/>here</a> </p>
</font>
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

  
 
 
</font>
</body>
</html>



