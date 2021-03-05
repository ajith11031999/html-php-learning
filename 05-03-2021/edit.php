<!DOCTYPE HTML>
<html>  
<body>


<?php

// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


$servername = "localhost";
$username = "ajith";
$password = "Aspire@123";
$dbname = "php";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";
$id = $_GET['id'];
echo "$id<br>";

$qry = mysqli_query($conn,"select firstname,lastname,email,phno from users where id='$id'"); // select query
$data = mysqli_fetch_array($qry);             // fetch data


if(isset($_POST['update'])) // when click on Update button
{ 
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    
    $edit = mysqli_query($conn,"update users set firstname='$firstname',lastname ='$lastname', email='$email',phno = '$phno' where id='$id'");

	
	
}
?>
<form method="post">
First name: <input type="text" name="firstname"  value="<?php echo $data['firstname'] ?>"><br>
Last name: <input type="text" name="lastname"  value="<?php echo $data['lastname'] ?>"><br>
E-mail: <input type="text" name="email" value="<?php echo $data['email'] ?>"><br>
Phno: <input type="text" name="phno" value="<?php echo $data['phno'] ?>"><br>
<input type="submit"  name="update"  value="Update">
</form>
</body>
</html>


