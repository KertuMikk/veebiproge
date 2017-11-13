<?php
    //muutujad

   

    


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


  $myName = $_SESSION["userId"];






 

 

 $monthNamesEt = ["jaanuar","veebruar","märts","aprill","mai","juuni","juuli","august","september","oktoober","november","detsember"];

//var_dump ($monthNamesEt);

//echo $monthNamesEt[3];



$monthNow = $monthNamesEt[date("n") - 1];
require("header.php");
?>

   <meta charset="utf-8">
   <title>Throney</title>

<link rel="icon" href="https://static.digitecgalaxus.ch/Files/8/1/8/0/7/4/6/person_image_286537.gif" type="GIF">

</head>
<body background="https://www.muralswallpaper.co.uk/app/uploads/pattern-clouds-pink-and-grey-nursery-plain-820x532.jpg">
<header>  
 <h1> <font face="Comic Sans MS"
              size="10"
              > 

</font>   </h1>
</header>

   <p> <font face="Comic Sans MS" 
             size="3" 
             >
 See veebileht on loodud õppetöö raames  
 ja ei sisalda tõsiseltvõetavat sisu!
 <?php
    echo "<p>YOU HAVE NO POWER HERE!!</p>";
	echo $myName;
	
  ?> 
<h2> Aaaand few links for you </h2>

<p>And <a href="../esimene.php">this </a>is my first precious </p>
<p>And <a href="../../../~nigokart/veebiprogrammeerimine/Esimene.php">this </a>is my friends first precious  </p>

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
<?php
	require("footer.php")
	
?>


