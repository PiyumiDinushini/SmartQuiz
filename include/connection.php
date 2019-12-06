<?php 

$dbserver="localhost";
$dbuser="root";
$dbpassword="";
$dbname="onlinequiz";

$connection=mysqli_connect($dbserver,$dbuser,$dbpassword,$dbname);

//checking connection
if(mysqli_connect_errno()){
    die("Error connecting database. ".mysqli_connect_error());
}
/*
else{
    echo "successfully connected";
}
*/

?>