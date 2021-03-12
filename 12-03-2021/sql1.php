<?php
include "config.php";

$sql = "INSERT INTO sample (firstname, lastname)
VALUES ('aji', 'xavier');";
$sql .= "INSERT INTO sample (firstname, lastname)
VALUES ('ravi', 'kumar');";
$sql .= "INSERT INTO sample (firstname, lastname)
VALUES ('bright','geetha')";

if ($conn->multi_query($sql) === TRUE) {
  echo "New records inserted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
