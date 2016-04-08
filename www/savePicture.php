<?php
$img = $_POST['Pic'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$success = file_put_contents('pythonImg/face.jpeg', $data);
print $success ? $file : 'Unable to save the file.';
?>


