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
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Account</title>
 <link rel="stylesheet" type="text/css" href="pretty.css">
 </head>
<body>
 <div class="header">
 <h2>The Library</h2>
 <h3>My Account</h2>
 </div>
 <div class="topnav">
 <a href="index.php">Home</a>
 <a class="active" href="account.php">My account</a>
 </div>
 <form action="search.php" method="GET">
 <input type="text" name="query" />
 <input type="submit" value="Search" />
 </form>
 <form action="index.php" method="GET">
 <div>
 <label for="genre">Book Genre:</label>
 <select name="genre" id="genre">
 <option value="">--- Choose a genre ---</option>
 <option value="1">Health</option>
 <option value="2">Business</option>
 <option value="3">Biography</option>
 <option value="4">Technology</option>
 <option value="5">Travel</option>
 <option value="6">Self-Help</option>
 <option value="7">Cookery</option>
 <option value="8">Fiction</option>
 </select>
 </div>
 <div>
 <button type="submit">Select</button>
 </div>
 </form>
<div class="content">
 <!-- notification message -->
 <?php if (isset($_SESSION['success'])) : ?>
 <div class="error success" >
 <h3>
 <?php
 echo $_SESSION['success'];
 unset($_SESSION['success']);
 ?>
 </h3>
 </div>
 <?php endif ?>
 <!-- logged in user information -->
 <?php if (isset($_SESSION['Username'])) : ?>
 <p>Welcome <strong><?php echo $_SESSION['Username']; ?></strong>!!</p>
 <p> <a href="index.php?logout='1'" style="color: #d4a4c2;">logout</a>
</p>
 <?php endif ?>
 <?php

 $filter = $_GET["genre"];
 require_once('dbconn.php');
 $username = $_SESSION['Username'];
 $sql= "SELECT * FROM reservations WHERE Username = $username";
 $result = $db->query($sql);

 if ($result->num_rows> 0) {
 // output data of each row
 echo "<table><tr><th>ISBN</th><th>Username</th><th>Reserved
Date</th><th>Cancel Reservation</th></tr>";
 while($row = $result->fetch_assoc()) {
 echo "<tr><td>" . $row["ISBN"]. "</td><td>" .
$row["Username"].
 "</td><td>" . $row["ReservedDate"]. "</td><td><a
href='cancelres.php? id=".$row['ISBN']."'>Cancel Reservation</td></tr>";} ;
 echo"</table>";
 }else {echo "0 results";
 }
 ?>
 $db->close();
 ?>
</div>
<div class="footer">
 <p>Website Created by: Kamila Krukowska C20353533 @ 2021 </p>
</div>
</body>
</html>
