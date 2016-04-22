<?php

$imageData=$GLOBALS['HTTP_RAW_POST_DATA'];
$filteredData=substr($imageData, strpos($imageData, ",")+1);
$unencodedData=base64_decode($filteredData);
$fp = fopen('face.jpeg', 'wb');
fwrite($fp, $unencodedData);
fclose($fp);

$filename = 'face.jpeg';
$percent = 4;

header('Content-Type: image/jpeg');

list($width, $height) = getimagesize($filename);
$new_width = $width * $percent;
$new_height = $height * $percent;

$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

imagejpeg($image_p, 'face.jpeg');

?>


