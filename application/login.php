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

<h1>Login</h1>
<h2>Enter the following details</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" placeholder="example@gmail.com" value="<?php echo $_POST["username"] ?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $_POST["password"] ?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Login">
  <p> If new user <a href="regform.php">Register</a></p>
    
</form>


<?php
include "config.php";
if(isset($_POST["submit"])){ 
    if(!empty($usernameErr or $passwordErr)){
     echo "Not signed in!!";
     return false;
    }  
}

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
      else{
       echo "Invalid login credentials";

      }
   }
}
$login = new Login();
$login->logn($conn,$password,$username);
      
?>

</body>
</html>

