<?php 
	
	require 'connect.php';

	$proposalID = $_GET['id'];
	$imgURL = base64_decode($_GET['data']);



	header('Content-Type: image/jpeg');

	function createImage($url, $out_filename, $width, $height)
	{
	    $src_img = ImageCreateFromString(file_get_contents($url));

	    $old_x = ImageSX($src_img);
	    $old_y = ImageSY($src_img);
	    $dst_img = ImageCreateTrueColor($width, $height);
	    ImageCopyResampled($dst_img, $src_img, 0, 0, 0, 0, $width, $height, $old_x, $old_y);

	    addWatermark($dst_img);

	    //ImageJpeg($dst_img, $out_filename, 80);

	}

	function addWatermark($image)
	{
	    $stamp = imagecreatefrompng('images/stamp.png');


	
		 $width = 70;
		 $height = 60;

		
		 $sx = imagesx($stamp);
		 $sy = imagesy($stamp);

		 imagecopy(
		 	$image, 
		 	$stamp, 
		 	(imagesx($image) - $sx)/2, (imagesy($image) - $sy)/2, 
		 	0, 0, 
		 	imagesx($stamp), imagesy($stamp));

		 
		 $height = $height === true ? (ImageSY($image) * $width / ImageSX($image)) : $height;

		 
		 $output = ImageCreateTrueColor($width, $height);
		 ImageCopyResampled($output, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));

		
		 ImageJPEG($output, $filename, 95); 

		 
		 return $output;
	}

	createImage($imgURL,$image,70,60);

	


?>

