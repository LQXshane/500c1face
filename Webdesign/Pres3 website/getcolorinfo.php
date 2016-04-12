<?php

if ($_POST['action'] == 'lipstick') {

// Get a connection for the database
require_once('../mysqli_connection.php');

// Create a query for the database
$query = "SELECT Brand,Color_code FROM Lipstick";

// Get a response from the database by sending the connection
// and the query

$response = @mysqli_query($dbc, $query);
// If the query executed properly proceed

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

// Close connection to the database
mysqli_close($dbc);

}


if ($_POST['action'] == 'sth') {

}

?>



