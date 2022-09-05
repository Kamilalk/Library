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
<!DOCTYPE>
<html >
<head>
 <title>Search results</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" href="pretty.css"/>
</head>
<body>
 <div class="header">
 <h2>The Library</h2>
 </div>
 <div class="topnav">
 <a href="index.php">Home</a>
 <a href="account.php">My account</a>
 </div>
 <form action="search.php" method="GET">
 <input type="text" name="query" />
 <input type="submit" value="Search" />
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
<?php
 $query = $_GET['query'];
 // gets value

 $min_length = 1;
 //set minimum length of the query

 if(strlen($query) >= $min_length){

 $query = htmlspecialchars($query);


 $query = mysqli_real_escape_string($db, $query);


 $raw_results = mysqli_query($db,"SELECT * FROM books WHERE (`BookTitle`
LIKE '%".$query."%') OR (`Author` LIKE '%".$query."%')") or die(mysql_error());

 if(mysqli_num_rows($raw_results) > 0){

 while($results = mysqli_fetch_array($raw_results,MYSQLI_ASSOC)){
 echo "<table><tr><th>ISBN</th><th>Book
Title</th><th>Author</th><th>Edition</th><th>Year</th><th>Category</th><th>Reserv
ed</th></tr>";
 echo "<tr><td>" . $results["ISBN"]. "</td><td>" .
$results["BookTitle"].
 "</td><td>" . $results["Author"]. "</td><td>" .
$results["Edition"].
 "</td><td>" . $results["Year"]. "</td><td>" .
$results["Category"]. "</td><td>" . $results["Reserved"]."</td></tr>";
 echo"</table>";

 }

 }
 else{
 echo "No results";
 }

 }
 else{
 echo "Minimum length is ".$min_length;
 }
?>
 <!-- logged in user information -->
 <?php if (isset($_SESSION['Username'])) : ?>
 <p> <a href="index.php?logout='1'" style="color: #d4a4c2;">logout</a>
</p>
 <?php endif ?>
</div>
</body>
<div class="footer">
 <p>Website Created by: Kamila Krukowska C20353533 @ 2021 </p>
</div>
</html>
