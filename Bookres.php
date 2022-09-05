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
 $isbn = $_GET['id'];
 $username = $_SESSION['Username'];
 $date = date('Y-m-d');
 $sql = "INSERT INTO reservations (ISBN, Username, ReservedDate) values
('$isbn', '$username', '$date')";
 $sql2 = "UPDATE books SET Reserved='Y' WHERE ISBN=$isbn";
 if ($db->query($sql2) === TRUE) {
 echo "success";
 } else {
 echo "Error: " . $sql2 . "<br>" . $db->error;
 }
 if ($db->query($sql) === TRUE) {
 header("location: success.php");
 } else {
 echo "Error: " . $sql . "<br>" . $db->error;
 }
 $db->close();
?>