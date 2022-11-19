<?php

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$DB_SERVER = "localhost";
$DB_USERNAME ="root";
$DB_PASSWORD= "";
$DB_NAME="user_test_php";
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>