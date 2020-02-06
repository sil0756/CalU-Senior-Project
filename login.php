<?php

// Gets the connection to the DB
require_once ('dbconnect.php');
//
if (isset($_POST['username']) and isset($_POST['password'])){
	
	// Assigning POST values to variables.
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// CHECK FOR THE RECORD FROM TABLE
	$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
	 
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);
	
	if ($count == 1){
	
	//echo "Login Credentials verified";
	//echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
  header('Location: homepage.php');
	}else{
    //echo "<script type='text/javascript'>alert('Incorrect username or password. Please try again.')</script>";
		header('Location: login.php');
	}
	}
?>




<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>

<ul>
  <li style="float:left"><a href="#">Bronco</a>
  <li><a href="homepage.php">Home</a></li>
  <li><a href="aboutus.php">About Us</a></li>
  <li><a href="purpose.php">Purpose</a></li>
  <li><a href="faq.php">FAQ</a></li>
  <li><a href="createUA.php">Create User Account</a></li>
  <li><a class="active" href="login.php">Login</a></li>
  <li><a href="logout.php">Logout</a></li>
  <li><a href="parts.php">Parts</a></li>
  <li><a href="phonebook.php">Phonebook</a></li>
  <li><a href="projects.php">Projects</a></li>
  <li><a href="files.php">Files</a></li>
  <li><a href="WorkCompleted.php">Work Completed</a></li>
</ul>


<!-- Form -->
    <div class="form-style-6">
    <body id="body_bg">
<form id="login-form" method="post" action="login.php">
    <p>
        <label for="lastName">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="emailAddress">Password:</label>
        <input type="text" type="password" name="password" id="password">
    </p>
    <input type="submit" value="Submit">
</form>
</div>



</body>
</html>
