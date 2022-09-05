<?php
session_start();
// initializing variables
$Username = "";
$password_1 = "";
$password_2 = "";
$password = "";
$Firstname = "";
$Surname = "";
$Address = "";
$City = "";
$Phone = "";
$errors = array();
require_once('dbconn.php');
// REGISTER USER
if (isset($_POST['reg_user'])) {
 $Username = mysqli_real_escape_string($db, $_POST['Username']);
 $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
 $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
 $Firstname = mysqli_real_escape_string($db, $_POST['Firstname']);
 $Surname= mysqli_real_escape_string($db, $_POST['Surname']);
 $Address = mysqli_real_escape_string($db, $_POST['Address']);
 $City = mysqli_real_escape_string($db, $_POST['City']);
 $Phone = mysqli_real_escape_string($db, $_POST['Phone']);
 $lengthpassword = strlen($password_1);
 $lengthphone = strlen($Phone);
 // form validation: ensure that the form is correctly filled
 if (empty($username)) { array_push($errors, "Username is required"); }
 if (empty($password_1)) { array_push($errors, "Password is required"); }
 if ($password_1 != $password_2) { array_push($errors, "The two passwords do not
match"); }
 if ($lengthpassword > 6) { array_push($errors, "Password has to be 6
characters"); }
 if ($lengthpassword < 6) { array_push($errors, "Password has to be 6
characters"); }
 if (empty($Firstname)) { array_push($errors, "Firstname is required"); }
 if (empty($Surname)) { array_push($errors, "Surname is required"); }
 if (empty($Address)) { array_push($errors, "Address is required"); }
 if (empty($City)) { array_push($errors, "City is required"); }
 if (empty($Phone)) { array_push($errors, "Phone number is required"); }
 if ($lengthphone > 10) { array_push($errors, "invalid phone number, has to be
10 characters"); }
 if ($lengthphone < 10) { array_push($errors, "invalid phone number, has to be
10 characters"); }
 if (is_numeric($Phone) != 1) {array_push ($errors, "invalid phone number,
please make sure only numbers are entered"); }
 //check database for same user
 $user_check_query = "SELECT * FROM user WHERE Username='$Username' LIMIT 1";
 $result = mysqli_query($db, $user_check_query);
 $user = mysqli_fetch_assoc($result);

 if ($user) { // if user exists
 if ($user['Username'] === $Username) {
 array_push($errors, "Username already exists");
 }
 }
 // register user
 if (count($errors) == 0) {
 $password = $password_1;//encrypt the password before saving in the database
 $query = "INSERT INTO user (Username, Password, Firstname, Surname, Address,
City, Phone)
 VALUES('$Username', '$password', '$Firstname', '$Surname', '$Address',
'$City', '$Phone')";
 mysqli_query($db, $query);
 $_SESSION['Username'] = $Username;
 $_SESSION['success'] = "You are now logged in";
 header('location: index.php');
 }
}
if (isset($_POST['login_user'])) {
 $Username = mysqli_real_escape_string($db, $_POST['Username']);
 $password = mysqli_real_escape_string($db, $_POST['password']);

 if (empty($Username)) {
 array_push($errors, "Username is required");
 }
 if (empty($password)) {
 array_push($errors, "Password is required");
 }

 if (count($errors) == 0) {
 $password = $password;
 $query = "SELECT * FROM user WHERE Username='$Username' AND
password='$password'";
 $results = mysqli_query($db, $query);
 if (mysqli_num_rows($results) == 1) {
 $_SESSION['Username'] = $Username;
 $_SESSION['success'] = "You are now logged in";
 header('location: index.php');
 }else {
 array_push($errors, "Wrong username/password combination");
 }
 }
 }

 ?>
