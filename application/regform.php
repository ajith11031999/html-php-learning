<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="regcss.css">
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
   if($_POST['admin']){
   $admin = test_input($_POST["admin"]);} 
   else { $admin = 'Not an admin';}  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="border:1px solid #ccc">  
  <div class="container">
    <h1>welcome to Godspeed.com</h1>
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <p><span class="error">* required field</span></p>
    <hr>

    <label for="username"><b>Username</b></label><br>
    <input type="text"  name="username" placeholder="example@gmail.com" value="<?php echo $_POST["username"] ?>" required>
    <span class="error">* <?php echo $usernameErr;?></span>
    <br><br>

    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" value="<?php echo $_POST["password"] ?>" required>
    <span class="error">* <?php echo $passwordErr;?></span>
    <br><br>
    
     <label for="phno"><b>Phno</b></label><br>
    <input type="text" placeholder="Enter Phone number" name="phno" value="<?php echo $_POST["phno"] ?>" required>
    <span class="error">* <?php echo $phnoErr;?></span>
    <br><br>
    
   
    <label for="admin"> Register as admin</label><br>
    <input type='checkbox' name='admin' value='admin'>
   
    <div class="clearfix">
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
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
echo $admin;
echo "<br>";
class Register{
  function Insert($conn,$admin,$username,$password,$phno){ 
    $sql = "INSERT INTO users (admin,username,password,phno) VALUES ('$admin','$username', '$password', '$phno')";   
    if(mysqli_query($conn, $sql)){
         echo "Inserted into the table<br>";  
    }
  }
}
$insert = new Register();
$insert->Insert($conn,$admin,$username,$password,$phno);
    
?>

</body>
</html>

