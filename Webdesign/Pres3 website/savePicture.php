<?php
$imageData=$GLOBALS['HTTP_RAW_POST_DATA'];
$filteredData=substr($imageData, strpos($imageData, ",")+1);
$unencodedData=base64_decode($filteredData);
$fp = fopen('face.jpeg', 'wb');
fwrite($fp, $unencodedData);
fclose($fp);

// The file
$filename = 'face.jpeg';
$percent = 4;

// Content type
header('Content-Type: image/jpeg');

// Get new dimensions
list($width, $height) = getimagesize($filename);
$new_width = $width * $percent;
$new_height = $height * $percent;

// Resample
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// Output
imagejpeg($image_p, 'face.jpeg');

echo 'hi';

?>


