<?php

require("../../../config.php");



$notice = Lisa();
if (isset($_POST['submit']))

{

    $file_name = $_FILES['file']['name'];

    $file_type = $_FILES['file']['type'];

    $file_size = $_FILES['file']['size'];



    $allowed_extensions = array("webm", "mp4", "ogv");

    $file_size_max = 2147483648;

    $pattern = implode ($allowed_extensions, "|");



    if (!empty($file_name))

    {

        if (preg_match("/({$pattern})$/i", $file_name) && $file_size < $file_size_max)

        {

            if (($file_type == "video/webm") || ($file_type == "video/mp4") || ($file_type == "video/ogv"))

            {

                if ($_FILES['file']['error'] > 0)

                {

                    echo "Unexpected error occured, please try again later.";

                } else {

                    if (file_exists("video/".$file_name))

                    {

                        echo $file_name." already exists.";

                    } else {

                        move_uploaded_file($_FILES["file"]["tmp_name"], "video/".$file_name);

                        echo "Stored in: " . "video/".$file_name;
                        
						$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]); 
 
						$stmt = $mysqli->prepare("INSERT INTO vidupload (name, userid) VALUES (?, ?)"); 

						echo $mysqli->error; 
				 
						$stmt->bind_param("si",$file_name, 2); 
				 
						if ($stmt->execute()){ 
				 
							$notice = "Video has been saved"; 
				 
						} else { 
				 
							$notice = "something went wrong!" .$stmt->error; 
				 
						} 
				 
						$stmt->close(); 

						$mysqli->close();
						echo "NOPE"
						

                }

            } else {

                echo "Invalid video format.";

            }

        }else{

            echo "where is my mojo?? grrr";

        }

    } else {

        echo "Please select a video to upload.";

    }

}

?>

<!DOCTYPE html>

<html>

<body>



<form action="video_upload1.php" method="post" enctype="multipart/form-data">

<input type="file" name="file"><br />

<input type="submit" name="submit" value="Submit">

</form>



</body>

</html>