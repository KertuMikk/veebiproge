<?php
	
	
	
	
	
	class Photoupload{
	//properties e. muutujad, methods e meetodid
	//	
	/*public $testpublic;
	public $testprivate;
	 //protected funktsioon	*/
		
	private $tmpName;
	private $imageFileType;
	private $myTempImage;
	private $myImage;
	public $exifToImage;
	
	function __construct($name, $type){
	/*$this->testpublic = "Väga avalik muutuja";
	$this->testprivate = $x;*/
	$this->tmpName = $name;
	$this->imageFileType = $type;
		
		
	}
	
	private function createImage(){
		
	//lähtudes failitüübist, loome pildiobjekti

		if($this->imageFileType == "jpg" or $this->imageFileType == "jpeg"){

			$this->myTempImage = imagecreatefromjpeg($this->tmpName);

		}

		if($this->imageFileType == "png"){

			$this->myTempImage = imagecreatefrompng($this->tmpName);

		}

		if($this->imageFileType == "gif"){

			$this->myTempImage = imagecreatefromgif($this->tmpName);

		}
	}
	
	
	
	public function resizeImage($width, $height){
	$this->createImage();	
		
		$imageWidth = imagesx($this->myTempImage);

		$imageHeight = imagesy($this->myTempImage);

		

		$sizeRatio = 1;

		if($imageWidth > $imageHeight){

			$sizeRatio = $imageWidth / $width;

		} else {

			$sizeRatio = $imageHeight / $height;

		}

		$this->myImage = $this->resize_image($this->myTempImage, $imageWidth, $imageHeight, round($imageWidth / $sizeRatio), round($imageHeight / $sizeRatio));	
		
	}
	
	
	
	
	private function resize_image($image, $origW, $origH, $w, $h){

		$dst = imagecreatetruecolor($w, $h);
		//säilitan läbipaistvuse
		imagesavealpha($dst, true);
		$transColor = imagecolorallocatealpha($dst, 0, 0, 0, 127);
		imagefill($dst, 0, 0, $transColor);
		
		
		imagecopyresampled($dst, $image, 0, 0, 0, 0, $w, $h, $origW, $origH);

		return $dst;

	}
	public function addWatermark($marginHor, $marginVer){
		//lisame vesimärgi

		$stamp = imagecreatefrompng("../../graphics/hmv_logo.png");

		$stampWidth = imagesx($stamp);

		$stampHeight = imagesy($stamp);

		$stampPosX = imagesx($this->myImage) - $stampWidth - $marginHor;

		$stampPosY = imagesy($this->myImage) - $stampHeight - $marginVer;

		imagecopy($this->myImage, $stamp, $stampPosX, $stampPosY, 0, 0, $stampWidth, $stampHeight);
		
	}
	
	public function readExif(){
		

		@$exif = exif_read_data($this->tmpName, "ANY_TAG", 0, true);


		if(!empty($exif["DateTimeOriginal"])){

			$this->exifToImage = "Pilt tehti: " .$exif["DateTimeOriginal"];

		} else {

			$this->exifToImage = "Pildistamise aeg teadmata!";

		}
	}

	public function addTextWatermark($text){
		$textColor = imagecolorallocatealpha($this->myImage, 255, 255, 255, 50);

		imagettftext($this->myImage, 20, 0, 10, 25, $textColor, "../../graphics/CaviarDreams.ttf", $text);
			
			
			
			
		}
		
	public function savePhoto($directory, $fileName){
		$target_file = $directory. $fileName;
		if($this->imageFileType == "jpg" or $this->imageFileType == "jpeg"){

			if(imagejpeg($this->myImage, $target_file, 90)){

				$notice = "True";

			} else {

				$notice = "True";

			}

			}

			if($this->imageFileType == "png"){

				if(imagepng($this->myImage, $target_file, 6)){

					$notice = "True";

				} else {

					$notice = "False";

				}

			}

			if($this->imageFileType == "gif"){

				if(imagegif($this->myImage, $target_file)){

					$notice = "True";

				} else {

					$notice = "Vabandust! Faili üleslaadimisel tekkis viga!";

				}

			}
		return $notice;
	}
	public function saveOriginal($directory, $fileName){
		if (move_uploaded_file($this->tmpName, $target_file)) {

					$notice .= "True";

				} else {

					$notice .= "False";

				}
		}
	
	
	
	
	public function clearImages(){
		
		
		imagedestroy($this->myTempImage);

		imagedestroy($this->myImage);
		}
		
		
	}
	//klass lõppeb







?> 