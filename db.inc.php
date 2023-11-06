<?php

$servername = "localhost";
$username = "diego";
$password = "1RkaKKjuoLwVLR61";
$dbname = "diego";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>