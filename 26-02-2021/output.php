<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>

Your email address is: <?php echo $_POST["email"];?><br>

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

// inserting data into mySQL table
$sql = "INSERT INTO users (name,email)
VALUES ('{$_POST['name']}', '{$_POST['email']}')";

// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

// checking whether the data added to the mySQL table or not
if (mysqli_query($conn, $sql)) {
  echo "inserted successfully into the table";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


// closing connection
$conn->close();

?>
</body>
</html>

