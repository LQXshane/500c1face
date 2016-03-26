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

    <title>Withc-homepage</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-warning btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top"  onclick = $("#menu-close").click(); >WITCHCRAFT</a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#about" onclick = $("#menu-close").click(); >About</a>
            </li>
            <li>
                <a href="#services" onclick = $("#menu-close").click(); >Services</a>
            </li>
            <li>
                <a href="#portfolio" onclick = $("#menu-close").click(); >Portfolio</a>
            </li>
            <li>
                <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
            </li>
        </ul>
    </nav>



    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
         <div class="container-fluid">
                <h1>Welcome to Witch.</h1>


                <?php

                $nameErr = $emailErr = $genderErr = $websiteErr = "";
                $name = $email = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                   if (empty($_POST["name"])) {
                     $nameErr = "Name is required";
                   } else {
                       $name = test_input($_POST["name"]);
                        // check if name only contains letters and whitespace
                       if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                       $nameErr = "Only letters and white space allowed"; 
                     }
                   }
                   
                   if (empty($_POST["email"])) {
                        $emailErr = "Email is required";
                   } else {
                     $email = test_input($_POST["email"]);
    
                     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                       $emailErr = "Invalid email format"; 
                     }
                   }
                }

                function test_input($data) {
                   $data = trim($data);
                   $data = stripslashes($data);
                   $data = htmlspecialchars($data);
                   return $data;
                }
                ?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-left">
                        </div>

                        <div class="col-md-4 text-left">
                            <p><span class="error">* required field.</span></p>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                             Name: <input type="text" name="name">
                            <span class="error">* <?php echo $nameErr;?></span>
                            <br><br>
                            E-mail: <input type="text" name="email">
                            <span class="error">* <?php echo $emailErr;?></span>
                            <input type="submit" name="submit" value="Submit"> 
                            </form>

                           <?php
                         echo "<h2>Your Input:</h2>";
                         echo $name;
                         echo $email;
                         ?>
                         </div>

                         <div class="col-md-4 text-left">
                         </div>
                    </div>
                </div>



                <h3>Try out make-ups from Amazon now</h3>
                <br>
                <a href="#about" class="btn3d btn-warning btn-lg">More About WitchA</a>
                <br><br><br>
                <a href="facial effect.html" class="btn3d btn-warning btn-lg" target="_blank">Try WitchA Now</a>
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
    <section id="portfolio" class="portfolio">
        <div class="container">
           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                 <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                 </ol>

                   <!-- Wrapper for slides -->
                 <div class="carousel-inner" role="listbox">
                 <div class="item active">
                     <img class="img-portfolio img-responsive" src="img/slideshow1.png" alt="void">
                 </div>

                 <div class="item">
                      <img class="img-portfolio img-responsive" src="img/slideshow2.png" alt="void">
                 </div>

                 <div class="item">
                    <img class="img-portfolio img-responsive" src="img/slideshow3.png" alt="void">
                 </div>

                 <div class="item">
                   <img class="img-portfolio img-responsive" src="img/slideshow4.png" alt="void">
                 </div>
          </div>

                 <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
        </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>




    <!-- Call to Action -->
    <aside class="call-to-action bg-information">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>The buttons below are impossible to resist.</h3>
                    <a href="#" class="btn btn-lg btn-success">Suprise Me!</a>
                    <a href="#" class="btn btn-lg btn-primary">Explore Me!</a>
                </div>
            </div>
        </div>
    </aside>

  
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
