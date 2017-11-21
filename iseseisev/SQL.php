<?php
$database = "if17_mikkkert_2";
require("../../../config.php");

function Lisa($name){ 

		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]); 
 
		$stmt = $mysqli->prepare("INSERT INTO vidupload (name, userid) VALUES (?, 2)"); 

		echo $mysqli->error; 
 
		$stmt->bind_param("s",$name); 
 
		if ($stmt->execute()){ 
 
			$notice = "Video has been saved"; 
 
		} else { 
 
			$notice = "something went wrong!" .$stmt->error; 
 
		} 
 
		$stmt->close(); 

		$mysqli->close();
echo "Uploaded";
return $notice; 
} 




?>