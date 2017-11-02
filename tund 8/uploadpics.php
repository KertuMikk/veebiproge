<?php
if(isset($_POST["submitBtn"])) 
{ 
require ("upload.php");
}
?> 
<!DOCTYPE html>
<html>
<body background="https://www.muralswallpaper.co.uk/app/uploads/pattern-clouds-pink-and-grey-nursery-plain-820x532.jpg">

<form action="upload.php" method="post" enctype="multipart/form-data">
    <p>Select image to upload:</p>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="submitBtn" value="Upload Image" name="submit">
</form>
<form action="main.php">
<input type="submit" value="Back to main page">
</form>

</body>
</html> 