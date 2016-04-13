<?php
$filename="face.jpeg";
header('Content-type: image/jpeg');
$source = imagecreatefromjpeg($filename);
$rotate = imagerotate($source, 180, 0);
imagejpeg($rotate, "facer2.jpeg");

header("Content-Type: image/jpeg");

$file = file_get_contents('facer2.jpeg');

echo base64_encode($file);

?>


