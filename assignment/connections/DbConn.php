<?php
$hostname= "localhost";
$database='mydatabase';
$username= "root";
$userpass= "";
$mydatabase;
$conn= mysqli_connect($hostname, $username, $userpass,"mydatabase") or trigger_error(mysqli_error(),E_USER_ERROR);
// Check connection
if (!$database) {
  die("Connection failed: " . mysqli_connect_error());
}



?>

