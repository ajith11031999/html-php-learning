<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="logincss.css">
</head>
<body>  

<?php
$usernameErr = $passwordErr = $phnoErr = "";
$username = $password = $phno =  ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"]) || preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/", $_POST["username"]) == false) {
    $usernameErr = "Invalid username";
  } else {
    $username = test_input($_POST["username"]);
  }
    if (empty($_POST["password"]) || strlen($_POST["password"])<=8 || preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$", $_POST["password"] == false)) {
    $passwordErr = "Invalid Password";
  } else {
    $password = test_input($_POST["password"]);
  } 
 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Welcome to Godspeed.com</h1>
<p>Please fill in this form to sign in.</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <div class="imgcontainer">
    <img src="logo.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <p><span class="error">* required field</span></p> <br>
    <label for="username"><b>Username</b></label> <br>
    <input type="text" placeholder="Enter Username" name="username" required>
    <span class="error">* <?php echo $usernameErr;?></span>
     <br> <br>
     
    <label for="password"><b>Password</b></label> <br>
    <input type="password" placeholder="Enter Password" name="password" required> 
    <span class="error">* <?php echo $passwordErr;?></span>
    <br> <br>
   
    <button type="submit" name="submit" value="Submit">Login</button>
    <p> If new user <a href="regform.php">Register</a></p>
  </div>
  
</form>


<?php
include "config.php";


echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $phno;
echo "<br>";

class Login{

   function logn($conn,$password,$username){     
      $count = 0;
      $records = mysqli_query($conn,"select username from users where password = '$password' ");
      while($data = mysqli_fetch_array($records)){
        if($data['username'] == $username){
          $count = $count+1;
         }
      }
      if($count == 1){
       echo "Login Successfull";
      }
   }
}
if(isset($_POST["submit"])){ 
    if(!empty($usernameErr or $passwordErr)){
     echo "Invalid login credentials!!";
     
     return false;
    }  

$login = new Login();
$login->logn($conn,$password,$username);
}      
?>

</body>
</html>

