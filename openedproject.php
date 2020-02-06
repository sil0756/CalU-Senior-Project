PHP
<?php

//Connects to the MySQL database using the PDO extension
$pdo = new PDO('mysql:host=localhost;dbname=bronco', 'root', '');

//Selects data from DB
$sql = "SELECT projectID, projectname FROM projects";

//Prepares the select statement
$stmt = $pdo->prepare($sql);

//Executes the statement
$stmt->execute();

//Retrieves the rows with fetchall
$projectsfromDB = $stmt->fetchAll();

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
  <li><a href="createUA.php">Create project Account</a></li>
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
         <h1>Open Project</h1>
         <select>
    <?php foreach($projectsfromDB as $project): ?>
        <option value="<?= $project['projectID']; ?>"><?= $project['projectname']; ?></option>
    <?php endforeach; ?>
</select>
            <input type="submit" value="Submit" />
         </form>
      </div>
      <script src="js/scripts.js"></script>


      <div class="form-style-6">
         <h1>Project Name Goes Here and appears only after being selected</h1>
         <form>
            <input type="text" name="projectid" placeholder="projectid" />
            <input type="text" name="projectname" placeholder="projectname" />
            <input type="text" name="Make" placeholder="Make" />
            <input type="text" name="Model" placeholder="Model" />
            <input type="text" name="trim_pkg" placeholder="trim_pkg" />
            <input type="text" name="projectdesc" placeholder="projectdesc" />
            <input type="date" name="purchdate" placeholder="purchdate" />
            <input type="text" name="purchprice" placeholder="purchprice" />
            <input type="text" name="sellprice" placeholder="sellprice" />
            <input type="date" name="selldate" placeholder="selldate" />
            <input type="text" name="projectcomments" placeholder="projectcomments" />
            <input type="submit" value="Submit" />
         </form>
      </div>

</body>

</html>



