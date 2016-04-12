<?php




    header("Content-Type: image/jpeg");
    $file = file_get_contents('face.jpeg');
    echo base64_encode($file);

?>
