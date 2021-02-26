<?php

$servername = "localhost";
$username = "ajith";
$password = "Aspire@123";
$dbname = "php";


// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";


// fetching data from mySQL table
$sql = "SELECT name FROM users";
$result = $conn->query($sql);

// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

// checking whether the data is fetched from the mySQL table or not
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " Name: " . $row["name"].  "<br>";
  }
} else {
  echo "0 results";
}

// closing connection
$conn->close();
?>

