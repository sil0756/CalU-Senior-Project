<?php
// Connect to bronco DB
$link = mysqli_connect("localhost", "root", "", "bronco");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// If value is assigned, executes the code within the curly braces
if (isset($_POST['userid']) and isset($_POST['username']) and isset($_POST['password']) ){

// Escape user inputs for security
$userid = mysqli_real_escape_string($link, $_REQUEST['userid']);
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
 
// Attempt insert query execution
$sql = "INSERT INTO users (userid, username, password) VALUES ('$userid', '$username', '$password')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
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
  <li><a class="active" href="createUA.php">Create User Account</a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="logout.php">Logout</a></li>
  <li><a href="parts.php">Parts</a></li>
  <li><a href="phonebook.php">Phonebook</a></li>
  <li><a href="projects.php">Projects</a></li>
  <li><a href="files.php">Files</a></li>
  <li><a href="WorkCompleted.php">Work Completed</a></li>
  <li><a href="createnewproject.php">Create New Project</a></li>
  <li><a href="openproject.php">Open Project</a></li>
</ul>

<div class="form-style-6">
<form action="createua.php" method="post">
    <p>
        <label for="firstName">UserID:</label>
        <input type="text" name="userid" id="userid">
    </p>
    <p>
        <label for="lastName">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="emailAddress">Password:</label>
        <input type="text" name="password" id="password">
    </p>
    <input type="submit" value="Submit">
</form>
</div>
</body>
</html>