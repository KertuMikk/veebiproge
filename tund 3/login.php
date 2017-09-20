<?php

if(isset($_POST["userName"]))
{
$myUserName = $_POST["userName"];
}











 
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
<body  background="https://cloud.graphicleftovers.com/51202/1515286/back.jpg">
<header>  
 <h1 > <font face="Comic Sans MS"
              size="10"
              color= "Ivory"> 
Log in form
</font>   </h1>
</header>
<font face="Comic Sans MS"
              size="3"
              color= "Ivory"> 
<h2>Lets log in to that page </h2>
  <form method="POST">
    <label> Username </label>
    <input name="userName" type="text"  
	value="<?php
	if(isset($_POST["userName"]))
{
echo $myUserName;
}
	
	?>" required >
	
	<input name="password" type="password"  required
	>
	
	
	<input id="logIn" type="submit" value="LoGiN">
	
	
  
  
  
    
  
  
  
  
  
  </form>
  


  
 
 
</font>
</body>
</html>



