<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
 <title>Registration system PHP and MySQL</title>
 <link rel="stylesheet" type="text/css" href="pretty.css">
</head>
<body>
 <div class="header">
 <h2>Register</h2>
 </div>

 <form method="post" action="register.php">
 <?php include('errors.php'); ?>
 <div class="input-group">
 <label>Username</label>
 <input type="text" name="Username" value="<?php echo $Username; ?>">
 </div>
 <div class="input-group">
 <label>Password</label>
 <input type="password" name="password_1" value="<?php echo $password_1;
?>">
 </div>
 <div class="input-group">
 <label>Confirm password</label>
 <input type="password" name="password_2" value="<?php echo $password_2;
?>">
 </div>
 <div class="input-group">
 <label>Firstname</label>
 <input type="text" name="Firstname" value="<?php echo $Firstname; ?>">
 </div>
 <div class="input-group">
 <label>Surname</label>
 <input type="text" name="Surname" value="<?php echo $Surname; ?>">
 </div>
 <div class="input-group">
 <label>Address</label>
 <input type="text" name="Address" value="<?php echo $Address; ?>">
 </div>
 <div class="input-group">
 <label>City</label>
 <input type="text" name="City" value="<?php echo $City; ?>">
 </div>
 <div class="input-group">
 <label>Phone</label>
 <input type="number" name="Phone" value="<?php echo $Phone; ?>">
 </div>
 <div class="input-group">
 <button type="submit" class="btn" name="reg_user">Register</button>
 </div>
 <p>
 Already a member? <a href="login.php">Sign in</a>
 </p>
 </form>
</body>
<div class="footer">
 <p>Website Created by: Kamila Krukowska C20353533 @ 2021 </p>
</div>
</html>