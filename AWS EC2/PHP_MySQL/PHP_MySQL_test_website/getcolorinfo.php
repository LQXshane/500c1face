<?php

if ($_POST['action'] == 'lipstick') {

require_once('../mysqli_connection.php');

$query = "SELECT Brand,Color_code,Product,ImgUrl FROM Lipstick";


$response = @mysqli_query($dbc, $query);

if($response){

$emptyarray=array();
while($row = mysqli_fetch_assoc($response)){
    $emptyarray[]= $row;
}

echo json_encode($emptyarray);

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

mysqli_close($dbc);
}

?>



