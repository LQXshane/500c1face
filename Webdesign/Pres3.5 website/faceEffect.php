<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
       .carousel-inner > .item > img,
       .carousel-inner > .item > a > img {
         width: 30%;
         margin: auto;
       }
    </style>

	<!-- Page title -->
    <title>Facial Effect</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    
	<!-- JQuery -->
    <script type="text/Javascript" src="js/jquery.js"></script>
    <script type="text/Javascript" src="js/jquery.base64.js"></script>

</head>


<body>

    <!-- Navigation -->
    <?php require 'nav.php';?>


    <!-- core -->
    <header  class="header">
    <div class="text-vertical-center">
    <div class="container" id="top">
        <div class="row">
            <!-- Capturing photo -->
            <div class="col-md-4 text-center">
                <video id="video" width="320" height="240" autoplay><p id="video1"></p></video>
                <button id="snap" class="btn3d btn-warning btn-lg">Snap Photo</button><br><br><br>
                <canvas id="canvas" width="320" height="240"></canvas>
                <button onclick="UploadPic()" class="btn3d btn-info btn-lg">Upload</button>
            </div>

            <!-- Color picker -->
            <div class="col-md-4 text-center">


                <div id="itemlipstick"></div>

                <button  class="btn3d btn-danger btn-lg" id="lipstick">Lipstick</button>
                <br> 

                <div class="btn-group" id="btngrp-lip">
                    <button type="button" id="lc1"></button>
                    <button type="button" id="lc2"></button>
                    <button type="button" id="lc3"></button>
                    <button type="button" id="lc4"></button>
                    <button type="button" id="lc5"></button>
                    <br>
                    <br>
                    <button type="button" id="lc6"></button>
                    <button type="button" id="lc7"></button>
                    <button type="button" id="lc8" onclick="lc8()"></button>
                    <button type="button" id="lc9" onclick="lc9()"></button>
                    <button type="button" id="lc10" onclick="lc10()"></button>
                </div>

                <br><br>

                <img id="ajax" width="320" height="240"></img>
                                
            </div>

            <!-- API -->
            <div class="col-md-4 text-center">
            </div>
        </div>
    </div>
    </div>
    </header>


    <!-- Portfolio -->
    <?php require 'portfolio.php';?>

    <!-- Contact-->
    <?php require 'contact.php';?>




<!---------------------------------Jquery/ajax script---------------------------------->

<!-- Capture photo -->
    <script>
        // Put event listeners into place
        window.addEventListener("DOMContentLoaded", function () {
            // Grab elements, create settings, etc.
            var canvas = document.getElementById("canvas"),
                context = canvas.getContext("2d"),
                video = document.querySelector('video'),
                videoObj = { "video": true },
                errBack = function (error) {
                    console.log("Video capture error: ", error.code);
                };

            // Put video listeners into place
            if (navigator.getUserMedia) { // Standard
                navigator.getUserMedia(videoObj, function (stream) {
                    video.src = stream;
                    video.play();
                }, errBack);
            } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
                navigator.webkitGetUserMedia(videoObj, function (stream) {
                    video.src = window.webkitURL.createObjectURL(stream);
                    video.play();
                }, errBack);
            }
            else if (navigator.mozGetUserMedia) { // Firefox-prefixed
                navigator.mozGetUserMedia(videoObj, function (stream) {
                    video.src = window.URL.createObjectURL(stream);
                    video.play();
                }, errBack);
            }

            //Triger camera
            document.getElementById("snap").addEventListener("click", function () {
                context.drawImage(video, 0, 0, 320, 240);
            })
        }, false);


    </script>



<!-- Upload Photo -->
    <script>
        function UploadPic() {
            var Pic = document.getElementById("canvas").toDataURL("image/jpeg");
            var ajax = new XMLHttpRequest();
            ajax.open("POST",'savePicture.php',false);
            ajax.setRequestHeader('Content-Type', 'image/jpeg');
            ajax.send(Pic);
            console.log(Pic)
        }
    </script>



<!-- database connection -->
    <script>
        $(document).ready(function () {
            $("#btngrp-lip").hide();

            $("#lipstick").click(function () {
                $("#btngrp-lip").toggle()

                $.ajax({
                    type: "POST",
                    url: 'getcolorinfo.php',
                    data: { action: 'lipstick' },
                    success: function (data) {
                        console.log("success");
                        console.log(data);
                        var data1 = jQuery.parseJSON(data);
                        console.log(data1);
                        $.each(data1, function (key, item) {
                            if (key == "0") {
                                $("#lc1").html(item.Brand).css("background-color", item.Color_code);
                            }
                            if (key == "1") {
                                $("#lc2").html(item.Brand).css("background-color", item.Color_code);
                            }
                            if (key == "2") {
                                $("#lc3").html(item.Brand).css("background-color", item.Color_code);
                            }
                            if (key == "3") {
                                $("#lc4").html(item.Brand).css("background-color", item.Color_code);
                            }
                            if (key == "4") {
                                $("#lc5").html(item.Brand).css("background-color", item.Color_code);
                            }
                            if (key == "5") {
                                $("#lc6").html(item.Brand).css("background-color", item.Color_code);
                            }
                            if (key == "6") {
                                $("#lc7").html(item.Brand).css("background-color", item.Color_code);
                            }
                            if (key == "7") {
                                $("#lc8").html(item.Brand).css("background-color", item.Color_code);
                            }
                            if (key == "8") {
                                $("#lc9").html(item.Brand).css("background-color", item.Color_code);
                            }
                            if (key == "9") {
                                $("#lc10").html(item.Brand).css("background-color", item.Color_code);
                            }
                        });
                    },
                    error: function (data) {
                        console.log("error");
                        console.log(data);
                    }

                });
            });
        });



    </script>



<!-- get pucture from php using js/ajax, instead of jquery/ajax-->
    <script>
        function lc10(filename) {
            var xmlhttp = new XMLHttpRequest;

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("ajax").src = "data:image/jpeg;base64," + xmlhttp.responseText;
                    console.log(xmlhttp.response);
                }
            };
            xmlhttp.open("GET", 'saveImg.php', true);
            xmlhttp.send(null);
            
        }


        function lc9(filename) {
            var xmlhttp = new XMLHttpRequest;

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("ajax").src = "data:image/jpeg;base64," + xmlhttp.responseText;
                    console.log(xmlhttp.response);
                }
            };
            xmlhttp.open("GET", 'rotate.php', true);
            xmlhttp.send(null);

        }


        function lc8(filename) {
            var xmlhttp = new XMLHttpRequest;

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("ajax").src = "data:image/jpeg;base64," + xmlhttp.responseText;
                    console.log(xmlhttp.response);
                }
            };
            xmlhttp.open("GET", 'sendpyimg.php', true);
            xmlhttp.send(null);

        }
    </script>





<!---------------------------------WebPage script------------------------------------------>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
