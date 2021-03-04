<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>



<table border="2">
  <tr>
    <td>lS.No.</td>
    <td>First Name</td>
    <td>Last name</td>
    <td>Email</td>
    <td>Phno</td>
    <td>Edit</td>
  </tr>
  
  
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
$sql = "INSERT INTO users (firstname,lastname,email,phno)
VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['email']}' , '{$_POST['phno']}')";

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

$records = mysqli_query($conn,"select * from users"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['firstname']; ?></td>
    <td><?php echo $data['lastname']; ?></td>
    <td><?php echo $data['email']; ?></td> 
    <td><?php echo $data['phno']; ?></td>   
     <td><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
   
  </tr>	

<?php
}
?>

</table>

</body>
</html>
  
  

