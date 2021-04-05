<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body>  

<?php
$usernameErr = $passwordErr = $phnoErr = "";
$username = $password = $phno = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"]) || !preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/", $_POST["username"] )) {
    $usernameErr = "enter a valid username";
  } else {
    $username = test_input($_POST["username"]);
  }
    if (empty($_POST["password"]) || strlen($_POST["password"])<=8 || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/", $_POST["password"])) {
    $passwordErr = "Entered password is not strong";
  } else {
    $password = test_input($_POST["password"]);
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
  Username: <input type="text" name="username" placeholder="example@gmail.com" value="<?php echo $_POST["username"] ?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $_POST["password"] ?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Phno: <input type="text" name="phno" value="<?php echo $_POST["phno"] ?>">
  <span class="error">* <?php echo $phnoErr;?></span>
  <br><br>
  Usertyple:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <input type="submit" name="submit" value="Submit">  
</form>

<?php  
include "config.php";
// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
if(isset($_POST["submit"])){ 
    if(!empty($usernameErr or $passwordErr or $phnoErr)){
     echo "Not registered!!";
     return false;
    }
    $records = mysqli_query($conn,"select username from users");
    while($data = mysqli_fetch_array($records)){     
         if($data['username'] == $username){
          echo "Not registered!!<br>";
          echo "username already exist"; 
          return false;
         }
       }  
   
}

echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $phno;
echo "<br>";

class Register{
  function Insert($conn,$username,$password,$phno){ 
    $sql = "INSERT INTO users (username,password,phno) VALUES ('$username', '$password', '$phno')";   
    if(mysqli_query($conn, $sql)){
         echo "Inserted into the table<br>";  
    }
  }
}
$insert = new Register();
$insert->Insert($conn,$username,$password,$phno);
    
?>

</body>
</html>

