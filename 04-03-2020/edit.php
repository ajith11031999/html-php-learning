<!DOCTYPE HTML>
<html>  
<body>
<form method="post">
First name: <input type="text" name="firstname"><br>
Last name: <input type="text" name="lastname"><br>
E-mail: <input type="text" name="email"><br>
Phno: <input type="text" name="phno"><br>
<input type="submit"  name="update"  value="Update">
</form>

<?php
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


if(isset($_POST['update'])) // when click on Update button
{ 
    $firstname = $_POST['firstname'];
    $lastname = $_POST['laststname'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    
    $edit = mysqli_query($conn,"update users set firstname='$firstname',lastname ='$lastname', email='$email',$phno = '$phno' where id='$id'");
	
	
}
?>

</body>
</html>


