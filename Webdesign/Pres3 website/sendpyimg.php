
<?php

$output = shell_exec('python /var/www/html/testpy.py');

    $filename="facer1.jpeg";
    header('Content-type: image/jpeg');
    $source = imagecreatefromjpeg($filename);
    $rotate = imagerotate($source, 90, 0);
    imagejpeg($rotate, "facer1.jpeg");

    header("Content-Type: image/jpeg");

    $file = file_get_contents('facer1.jpeg');

    echo base64_encode($file);






?>
