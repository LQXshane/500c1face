
    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
         <div class="container-fluid">
                <h1>Welcome to Witch.</h1>


                <?php include 'Form.php';?>

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
