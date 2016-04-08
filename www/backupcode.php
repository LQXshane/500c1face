

document.getElementById("r2").addEventListener("click", function LoadImg(filename) {
                    var xmlhttp;
                    xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("ajax").src = "data:image/jpg;base64," + xmlhttp.responseText;
                        }
                    };
                    xmlhttp.open("GET", 'rotate1.php?LoadImg=' + filename);
                    xmlhttp.send(null);
                }
             })



if (isset($_GET['LoadImg'])) {
    header("Content-Type: image/jpg");
    $file = file_get_contents("pythonImg/facer1.jpg");
    echo base64_encode($file);
}


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




 