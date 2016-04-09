<html>
<head>
<title>Add Lipstick</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['Color_code'])){

        // Adds name to array
        $data_missing[] = 'Color_code';

    } else {

        // Trim white space from the name and store the name
        $color_code = trim($_POST['Color_code']);

    }

    if(empty($_POST['Brand'])){

        // Adds name to array
        $data_missing[] = 'Brand';

    } else{

        // Trim white space from the name and store the name
        $brand_name = trim($_POST['Brand']);

    }

    if(empty($_POST['Product'])){

        // Adds name to array
        $data_missing[] = 'Product';

    } else {

        // Trim white space from the name and store the name
        $product_name = trim($_POST['Product']);

    }

    if(empty($_POST['Color'])){

        // Adds name to array
        $data_missing[] = 'Color';

    } else {

        // Trim white space from the name and store the name
        $color_name = trim($_POST['Color']);

    }

    if(empty($_POST['ASIN'])){

        // Adds name to array
        $data_missing[] = 'ASIN';

    } else {

        // Trim white space from the name and store the name
        $asin_num = trim($_POST['ASIN']);

    }

    
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO Lipstick (Color_code, Brand, Product, Color, ASIN) VALUES (?, ?, ?,
        ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        i Integers
        d Doubles
        b Blobs
        s Everything Else
        
        mysqli_stmt_bind_param($stmt, "sssss", $color_code. $brand_name, $product_name, $color_name, $asin_num);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Lipstick Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>

<form action="http://localhost/lipstickadded.php" method="post">

<b>Add a New Lipstick</b>

<p>Color_code:
<input type="text" name="Color_code" size="30" value="" />
</p>

<p>Brand:
<input type="text" name="Brand" size="30" value="" />
</p>

<p>Product:
<input type="text" name="Product" size="30" value="" />
</p>

<p>Color:
<input type="text" name="Color" size="30" value="" />
</p>

<p>ASIN:
<input type="text" name="ASIN" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>