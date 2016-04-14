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
    <title>WitchA-homepage</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
	<!-- JQuery -->
    <script type="text/Javascript" src="js/jquery.js"></script>

</head>



<body>

    <!-- Navigation -->
    <?php require 'nav.php';?>



    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
         <div class="container-fluid">
                <h1 class="color">Welcome to Witcha</h1>
                <h4>Try out make-ups from Amazon now</h4>
                <br>
                <a href="#about" class="btn3d btn-warning btn-lg">More About WitchA</a>
                <br><br><br>
                <a href="faceEffect.php" class="btn3d btn-info btn-lg">Try WitchA Now</a>
                <br><br><br>
                <a href="http://www.amazon.com/" class="btn3d btn-success btn-lg" target="_blank">Checkout Amazon Now</a>
            </div>
          </div>
    </header>



    <!-- About -->
    <section id="about" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
               </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h4 class="text-muted">Why need to go out to shop for make-ups?</h4> 
                        <h3>WE TOTALLY AGREE!</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h4 class="text-muted">Try out your favaraite make-ups in your comfort zone?</h4> 
                        <h3>WE CAN HELP!</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>All WitchA needs from you is "smile at the camera!"</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>



    <!-- Portfolio -->
    <?php require 'portfolio.php';?>

    <!-- Contact-->
    <?php require 'contact.php';?>


<!-------------------------------------------------------------------------------------->

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
