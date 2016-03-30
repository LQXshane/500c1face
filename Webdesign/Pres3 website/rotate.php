<?php

if($_POST['action'] == 'r1') {
    $filename="pythonImg/face.jpeg";
    header('Content-type: image/jpeg');
    $source = imagecreatefromjpeg($filename);
    $rotate = imagerotate($source, 180, 0);
    imagejpeg($rotate, "pythonImg/facer1.jpeg");
    echo base64_encode(file_get_contents("pythonImg/facer1.jpeg"));
}

if($_POST['action'] == 'r2') {
    $filename="pythonImg/face.jpeg";
    header('Content-type: image/jpeg');
    $source = imagecreatefromjpeg($filename);
    $rotate = imagerotate($source, 90, 0);
    imagejpeg($rotate, "pythonImg/facer2.jpeg");
    echo base64_encode(file_get_contents("pythonImg/facer2.jpeg"));
}

?>

 