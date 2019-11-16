<?php
$dsn1 = 'mysql:host=localhost;dbname=bronco';
$username1 = 'root';
$password1 = '';
try {
    $db = new PDO($dsn1, $username1, $password1);
}
catch(PDOException $e) {
    $error_message = $e->getMessage();
}
//connection to db
?>