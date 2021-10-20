<?php
header('content-type:image/jpeg');
session_start();

$_SESSION['secure']=rand(1000,9999);	///echo 'dsd';
///you cannot include any text or other php in this file
	$text=$_SESSION['secure'];
$font_size=30;
//make sure the x and y defined below are less than these values
$image_width=150;
$image_height=40;

$image=imagecreate($image_width,$image_height);
//background color color
imagecolorallocate($image,255,255,255);
//foreground color black
$text_color=imagecolorallocate($image,0,0,0);

//lining on images
for ($iii=0;$iii<90;$iii++) {
	$x1=rand(1,100);
	$y1=rand(1,100);
	$x2=rand(1,100);
	$y2=rand(1,100);
	
	imageline($image,$x1,$y1,$x2,$y2,$text_color);
	
}

//0 parameter is the angle and next two are x and y
imagettftext($image,$font_size,0,10,35,$text_color,'ANTQUAB.TTF',$text);
imagejpeg($image);

?>