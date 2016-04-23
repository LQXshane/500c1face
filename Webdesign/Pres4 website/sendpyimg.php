<?php

file_put_contents('cc.txt', $_POST['action']);

sleep(1);

$output = shell_exec('python dlib/python_examples/facepy.py face.jpeg cc.txt');

$file = file_get_contents('facepy.jpeg');

echo base64_encode($file);

unlink('facepy.jpeg');



?>
