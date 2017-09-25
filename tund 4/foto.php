<?php
  $picsDir = "../../pics/";
  $picFiles = [];
  $picFileTypes = ["jpg" , "jpeg" , "png" , "gif"];
  
  $allFiles = array_slice(scandir($picsDir),2);
  
  foreach ($allFiles as $file)
  {
	  $fileType = pathinfo($file, PATHINFO_EXTENSION);
	  if (in_array($fileType, $picFileTypes) == true) 
	  {
		array_push($picFiles, $file);   
		   
		   
	  }
	    
  }
  
  $fileCount = count($picFiles);
  $picNumber = mt_rand(0 ,($fileCount - 1));
  $picFile = $picFiles[$picNumber];
  
  //var_dump($picFiles);
  //$picFiles = ;
  
  
 
?>
<!DOCTYPE html>
<html>
<head>
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
 Kujutame nüüd ette, et siin on pilt ülikoolist :D 
 
 </p >
<p>
 <img src="<?php echo $picsDir .$picFile; ?>" 
 alt="ylikool" height="242" width="350"> 
 
 
</p>
<font face="Comic Sans MS"
              size="3"
              > 

  
 
 
</font>
</body>
</html>

