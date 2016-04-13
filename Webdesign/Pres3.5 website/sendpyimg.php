<?php

echo $_POST['lc8colorcode'];

$output = shell_exec('./cv.sh');

$filename="facepy.jpeg";
header('Content-type: image/jpeg');
$source = imagecreatefromjpeg($filename);
$rotate = imagerotate($source, 360, 0);
imagejpeg($rotate, "facepy.jpeg");

header("Content-Type: image/jpeg");

$file = file_get_contents('facepy.jpeg');

echo base64_encode($file);


unlink('facepy.jpeg');

?>
