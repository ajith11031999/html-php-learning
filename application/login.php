<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body>  

<?php
$usernameErr = $passwordErr = $emailErr = $phnoErr = $dateErr = "";
$username = $password = $email = $phno = $date = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"]) || preg_match("/^[a-zA-Z ]+$/", $_POST["username"]) == false) {
    $usernameErr = "Userame is required";
  } else {
    $username = test_input($_POST["username"]);
  }
    if (empty($_POST["password"]) || strlen($_POST["password"])<=8 || preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$", $_POST["password"] == false)) {
    $passwordErr = "Password is required";
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
  Username: <input type="text" name="username"  pattern="^[a-zA-Z ]+$" required>
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="text" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$" required>
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Login"> 
  <p> If new user <a href="regform.php">Register</a></p>
    
</form>


<?php


echo $username;
echo "<br>";
echo $password;
echo "<br>";


      
?>

</body>
</html>
