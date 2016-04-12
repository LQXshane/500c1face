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







if ($_POST['action'] == 'r1') {
    $output = shell_exec('python /var/www/html/testpy.py');
    echo $output;
};

if ($_POST['action'] == 'r2') {
    $filename="face.jpeg";
    header('Content-type: image/jpeg');
    $source = imagecreatefromjpeg($filename);
    $rotate = imagerotate($source, 180, 0);
    imagejpeg($rotate, "facer2.jpeg");
    echo base64_encode(file_get_contents('facer2.jpeg'));
    sleep(1);
    unlink('facer2.jpeg');
};


if ($_POST['action'] == 'r3') {
    $filename="face.jpeg";
    header('Content-type: image/jpeg');
    $source = imagecreatefromjpeg($filename);
    $rotate = imagerotate($source, 90, 0);
    imagejpeg($rotate, "facer3.jpeg");
    sleep(1);
    unlink('facer3.jpeg');
};


?>

