<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project1";
// create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if($db === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
