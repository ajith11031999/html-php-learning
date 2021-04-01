<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body>  

<?php

$tdate = date('Y-m-d'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"]) || preg_match("/^[a-zA-Z ]+$/", $_POST["username"] == false)) {
    $usernameErr = "Enter a valid username username";
  } else {
    $username = test_input($_POST["username"]);
  }
    if (empty($_POST["password"]) || strlen($_POST["password"])<=8 || preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$", $_POST["password"] == false)) {
    $passwordErr = "Entered password is not strong";
  } else {
    $password = test_input($_POST["password"]);
  }
  
  if (empty($_POST["email"])||preg_match("^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$", $_POST["email"] == false)) {
    $emailErr = "please enter valid email id";
  } else {
    $email = test_input($_POST["email"]);
  }
   if (empty($_POST["phno"]) ||preg_match("^[6-9][0-9]{9}$", $_POST["phno"] == false)) {
    $phnoErr = "please enter a valid phone number";
  } else {
    $phno = test_input($_POST["phno"]);
  }
    if (empty($_POST["date"]) || strcmp($_POST["date"],$tdate) != 0 ) {
    
    $dateErr = "please enter today's date";
    
  } else {
    $date = test_input($_POST["date"]);
  }
    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Registration</h1>
<h2>Enter the following details</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username"  pattern="^[a-zA-Z ]+$" required>
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="text" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$" required >
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$" required >
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Phno: <input type="text" name="phno" pattern="^[6-9][0-9]{9}$" required>
  <span class="error">* <?php echo $phnoErr;?></span>
  <br><br>
  Date: <input type="text" name="date" placeholder="YYYY-MM-DD"  required>
  <span class="error">* <?php echo $dateErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php  
include "config.php";



echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $email;
echo "<br>";
echo $phno;
echo "<br>";
echo $date;
echo "<br>";

if($date = ''){
header("Location: http://localhost/regform.php");
}
class Register{
 function Insert($conn,$username,$password,$email,$phno,$date){  
   if($username == "" or $password =="" or $email == "" or $phno =="" or $date ==""){
        
   }    
      $sql = "INSERT INTO users (username,password,email,phno,created_date) VALUES ('$username', '$password', '$email', '$phno','$date')";   
        

        if(mysqli_query($conn, $sql)){
         echo "Inserted into the table<br>";  
         header("Location: http://localhost/login.php");  
        }
    }

}




    
?>

</body>
</html>
