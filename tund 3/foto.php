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
 Kujutame nüüd ette, et siin on pilt ülikoolist :D 
 
 </p >
<p>
 <img src="../../../pics/tlu.jpg" 
 alt="ylikool" height="242" width="350"> 
 <img src="../../../pics/tlu1.jpg" 
 alt="ylikool" height="242" width="350"> 
 <img src="../../../pics/tlu2.jpg" 
 alt="ylikool" height="242" width="350"> 
 
</p>
<font face="Comic Sans MS"
              size="3"
              color= "Ivory"> 

  
 
 
</font>
</body>
</html>



