<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body>  

<?php
$usernameErr = $passwordErr = $emailErr = $phnoErr = "";
$username = $password = $email = $phno = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"]) || !preg_match("/^[a-zA-Z-' ]*$/", $_POST["username"] )) {
    $usernameErr = "Only letters and white space allowed";
  } else {
    $username = test_input($_POST["username"]);
  }
    if (empty($_POST["password"]) || strlen($_POST["password"])<=8 || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/", $_POST["password"])) {
    $passwordErr = "Entered password is not strong";
  } else {
    $password = test_input($_POST["password"]);
  }
  
  if (empty($_POST["email"])|| !preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/", $_POST["email"])) {
    $emailErr = "please enter valid email id";
  } else {
    $email = test_input($_POST["email"]);
  }
   if (empty($_POST["phno"]) || !preg_match("/^[6-9][0-9]{9}$/", $_POST["phno"])) {
    $phnoErr = "please enter a valid phone number";
  } else {
    $phno = test_input($_POST["phno"]);
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
  Username: <input type="text" name="username" value="<?php echo $_POST["username"] ?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $_POST["password"] ?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $_POST["email"] ?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Phno: <input type="text" name="phno" value="<?php echo $_POST["phno"] ?>">
  <span class="error">* <?php echo $phnoErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php  
include "config.php";

if(isset($_POST["submit"])){ 
    if(!empty($usernameErr or $passwordErr or $emailErr or $phnoErr)){
     echo "Not registered!!";
     return false;
    }
    $records = mysqli_query($conn,"select phno from users");
    while($data = mysqli_fetch_array($records)){     
         if($data['phno'] == $phno){
          echo "Not registered!!<br>";
          echo "phone number already exist"; 
          return false;
         }
       }  
   
}


echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $email;
echo "<br>";
echo $phno;
echo "<br>";

class Register{
  function Insert($conn,$username,$password,$email,$phno){ 
    $sql = "INSERT INTO users (username,password,email,phno,created_date) VALUES ('$username', '$password', '$email', '$phno')";   
    if(mysqli_query($conn, $sql)){
         echo "Inserted into the table<br>";  
    }
  }
}
$insert = new Register();
$insert->Insert($conn,$username,$password,$email,$phno);
    
?>

</body>
</html>

