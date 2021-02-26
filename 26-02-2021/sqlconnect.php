<?php

$servername = "localhost";
$username = "ajith";
$password = "Aspire@123";
$dbname = "hotel";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// closing connection
$conn->close();
?>


