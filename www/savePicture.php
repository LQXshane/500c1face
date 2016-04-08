<?php

$imageData=$GLOBALS['HTTP_RAW_POST_DATA'];
$filteredData=substr($imageData, strpos($imageData, ",")+1);
$unencodedData=base64_decode($filteredData);
$fp = fopen('pythonImg/face.jpeg', 'wb');
fwrite($fp, $unencodedData);
fclose($fp);

?>


