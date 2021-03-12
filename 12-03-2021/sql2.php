<?php
include "config.php";
// prepare and bind
$stmt = $conn->prepare("INSERT INTO sample (firstname, lastname) VALUES (?, ?)");
$stmt->bind_param("ss", $firstname, $lastname);

// set parameters and execute
$firstname = "jovan";
$lastname = "anu";
$stmt->execute();

$firstname = "rinu";
$lastname = "joe";
$stmt->execute();

$firstname = "ajith";
$lastname = "xavier";
$stmt->execute();

echo "New records inserted successfully";

$stmt->close();
$conn->close();
?>

