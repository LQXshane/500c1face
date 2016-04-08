<?php    
define('UPLOAD_DIR', 'uploads/');
$img = $_POST['imgBase64'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . uniqid() . '.png';
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
?> 



<!-- Get image from server -->
   
    <script>
        $(document).ready(function () {
            $("#r2").click(function () {
                $.ajax({
                    type: "POST",
                    url: 'rotate1.php',
                    data: { action: 'call_this_again' },
                    success: function (data) {
                        console.log("success");
                        console.log(data);
                    },
                    error: function (data) {
                        console.log("error");
                        console.log(data);
                    }
                });
                if ($data == 2){
                    $("#ajax").html('<img src="pythonImg/facer1.jpg" style="height: 582px;width: 1136px;"></img>');
                }
            })
        });
    </script> 


//define image path
    $filename="pythonImg/face.jpeg";

    // Load the image
    $source = imagecreatefromjpeg($filename);

    // Rotate
    $rotate = imagerotate($source, 90, 0);

    //and save it on your server...
    file_put_contents("pythonImg/facer2.jpeg", $rotate);

    $done = 1;




file_put_contents("pythonImg/facer1.png", file_get_contents("pythonImg/face.png"));




 