<?php
$servername = "mysql-server";
$username = "root";
$password = "secret";

// Create connection
$conn=mysqli_connect($servername, $username, $password,"new_database");

// Check connection
if (mysqli_connect_error()) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>