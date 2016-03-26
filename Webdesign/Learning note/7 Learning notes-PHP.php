PHP notes, *open with IDE, not browser*

Intro: html, css and javascript based server side script language;
       

Install: server must support PHP and SQL;
  
         Webmatrix3: PHP, html, css, javascript, json

         MySQL workbench: SQL;


Syntax: <?php
        // PHP code goes here
        ?>

        case sensitive, except for core commands, ie if, while, function;


Varaibles:  see javascript learning notes for more detail;

            declaring: $txt = "Hello world!";

            output variables: echo "I love $txt!"

            a loosely typed language: no need to define data type;

            variable scope: variables can be defined anywhere in the script;
               global and local variable scope: 
                  variable declared outside a function can only be used outside; 
                  function has to use variables declared locally;
                  if function need to use outside variables, it need to be declared as global:
                     $y = 10;
                     function myTest() {
                         global $y;
                         echo "<p> $y </p>"
                     }
               static scope: 
                   variables will be deleted after function finishes, static scope stops it:
                       static $x


Echo/print: both used to display, but print has a return value of 1, slightly slower;

            echo: <?php
                  $x = 5;
                  $y = 4;
                  echo "<h2>" . $x . "</h2>"; // same as echo "<h2> $x </h2>"
                  echo $x + $y;
                  ?>


Data type: string, integer, double, boolean;
           
           array: <?php $cars = array("Volvo","BMW","Toyota"); ?>;

           object: stores data and information on how to process that data;
                   there can be arrya of objects: [{},{}];


String: find length of string: echo strlen("Hello world!");

        count number of words: echo str_word_count("Hello world!");

        reverse a string: echo strrev("Hello world!");

        search for a text: echo strpos("Hello world!", "world");

        replace: echo str_replace("world", "Dolly", "Hello world!"); 


Constant: variables that cannot be changed or undefined after declarition;

          syntax: define(name, value, true) // it is case-sensitive unless true is entered;


Operators: similar to javascript's operator syntaxes;

           differences:
              ** exponential;
              ++$x: add 1 to x, then display x;
              $txt1 . $txt2: display "txt1 txt2";
              !=: not equal to;

           
If:  <?php
     $t = date("H");

     if ($t < "10") {
         echo "Have a good morning!";
     } elseif ($t < "20") {
         echo "Have a good day!";
     } else {
         echo "Have a good night!";
     }
     ?> 


Switch: <?php
        $favcolor = "red";

        switch ($favcolor) {
            case "red":
                echo "Your favorite color is red!";
                break;
            case "blue":
                echo "Your favorite color is blue!";
                break;
            case "green":
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }
        ?>


While: do loop test condition after excution, while loop does it beforehand;


For: for ($x = 0; $x <= 10; $x++) {
        echo "The number is: $x <br>";
     } 

     display every value in array:
        <?php
        $colors = array("red", "green", "blue", "yellow");

        foreach ($colors as $value) {
            echo "$value <br>";
        }
        ?>


Function:


Array: $cars = array("Volvo", "BMW", "Toyota");
       $cars[0] = "Volvo";


Superglobals: $GLOBALS: used to access global variables from anywhere in the PHP script;
              <?php
              $x = 75;
              $y = 25;
              function addition() {
                $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
              }
              addition();
              echo $z;
              ?>

              $_SERVER: elements holds information about headers, paths, and script locations;
              <?php
              echo $_SERVER['PHP_SELF'];
              echo $_SERVER['SERVER_NAME'];
              echo $_SERVER['HTTP_HOST'];
              echo $_SERVER['HTTP_REFERER'];
              echo $_SERVER['HTTP_USER_AGENT'];
              echo $_SERVER['SCRIPT_NAME'];
              ?> 
              more at: http://www.w3schools.com/php/php_superglobals.asp

              $_REQUEST: collect data after submitting an HTML form

              $_POST: collect form data after submitting an HTML form with method="post"; 
                also widely used to pass variables.

              $_GET: collect form data after submitting an HTML form with method="get"


Forn handling: html side:
               <form action="welcome_get.php" method="get">
               Name: <input type="text" name="name"> </form>
               php side: 
               Welcome <?php echo $_GET["name"]; ?>
               result: Welcome input_name;

               Get vs Post
               they both collect array of data (key/name pair);
               Get: via URL, visible to everyone, 2000 character limit;
                    can be used to bookmark the page, but shouldnt be used for password;
               Post: invisible, no charactor limit;
                     cannot bookmark page;


Form validation: $_SERVER["PHP_SELF"] returns the filename of the currently executing script;

                 htmlspecialchars() function converts special characters to HTML entities;

           Example:
<!DOCTYPE HTML>
<html> // PHP still use html syntax
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

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
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
       $emailErr = "Invalid email format";
     }
   }
    
   if (empty($_POST["website"])) {
     $website = "";
   } else {
     $website = test_input($_POST["website"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
       $websiteErr = "Invalid URL";
     }
   }

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   Name: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   Website: <input type="text" name="website" value="<?php echo $website;?>">
   <span class="error"><?php echo $websiteErr;?></span>
   <br><br>
   Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
   <br><br>
   Gender:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>


Array handling: 
<?php
$cars = array
   (
   array("Volvo",22,18),
   array("BMW",15,13),
   array("Saab",5,2),
   array("Land Rover",17,15)
   );
    
for ($row = 0; $row <  4; $row++) {
   echo "<p><b>Row number $row</b></p>";
   echo "<ul>";
   for ($col = 0; $col <  3; $col++) {
     echo "<li>".$cars[$row][$col]."</li>";
   }
   echo "</ul>";
}
?>


Include: thsi is how php build a website by including other blocks:
             <?php include 'menu.php';?>
             <?php include 'footer.php';?>


File handling: 









