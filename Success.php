<?php
 session_start();
 if (!isset($_SESSION['Username'])) {
 $_SESSION['msg'] = "You must log in first";
 header('location: login.php');
 }
 if (isset($_GET['logout'])) {
 session_destroy();
 unset($_SESSION['Username']);
 header("location: login.php");
 }
 require_once('dbconn.php');
?>
<!DOCTYPE html>
<html >
 <head>
 <title>Book Reserved succesfully</title>
 <link rel="stylesheet" href="pretty.css">
 </head>
 <body>
 <div class="content">
 <h1>This book has been reserved !</h1>
 <p>To head back to the main page: <a class="link" href="index.php">Main
Page</a>
 <p>To see all of your reserved books: <a class="link"
href="account.php">My Account</a>
 </div>

 </body>
</html>