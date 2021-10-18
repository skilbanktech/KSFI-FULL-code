<?php
session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 

$rand = $_GET['txt'];
$im = @imagecreatefromjpeg("images/captcha.jpg"); 

$str = $rand;
//ImageString($im, 20, 20, 14, $rand[0]." ".$rand[1]." ".$rand[2]." ".$rand[3]." ".$rand[4]." ".$rand[5], ImageColorAllocate ($im, 0, 0, 0));
ImageString($im, 20, 20, 14, $rand, ImageColorAllocate ($im, 0, 0, 0));

$_SESSION['captcha'] = $str;
Header ('Content-type: image/jpeg');
imagejpeg($im,NULL,100);
ImageDestroy($im);
?>