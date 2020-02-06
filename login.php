<?php
   // Gets the connection to the DB
   require_once ('dbconnect.php');
   
   // If variables are not null executes the code within the curly braces
   if (isset($_POST['username']) and isset($_POST['password'])){
   	
   	// Assigning POST values to variables.
   	$username = $_POST['username'];
   	$password = $_POST['password'];
   	
   	// Check for the records from the table
   	$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'"; 
   	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
   	$count = mysqli_num_rows($result);
     
     // If successful takes you to homepage.php, if unsuccessful to login.php
   	if ($count == 1){
     header('Location: homepage.php');
   	}else{
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
         <li><a href="home.php">Home</a></li>
  <li><a href="homepage.php">Admin Home Page</a></li>
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
         <li><a href="createnewproject.php">Create New Project</a></li>
  <li><a href="openproject.php">Open Project</a></li>
</ul>
      <!-- Form -->
      <div class="form-style-6">
         <body id="body_bg">
            <form id="login-form" method="post" action="login.php">
               <p>
                  <input type="text" name="username"placeholder="username" id="username">
               </p>
               <p>
                  <input type="text" type="password" name="password" placeholder="password" id="password">
               </p>
               <input type="submit" value="Submit">
            </form>
      </div>
   </body>
</html>