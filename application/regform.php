<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="regcss.css">
</head>
<body>  

<?php
$usernameErr = $passwordErr = $phnoErr = "";
$username = $password = $phno = $role = ""; 

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
   if($_POST['role']){
   $role = test_input($_POST["role"]);} 
     
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
    
   
    <label for="role">Type of user:</label>
   <select name="role" id="role">
    <option value="anonymous user">anonymous user</option>
    <option value="editor">editor</option>
    <option value="admin">admin</option>

  </select>
  <br><br>
   
    <div class="clearfix">
      <button type="submit" class="signupbtn" name="submit" value="Submit">Sign Up</button>
    </div>
  </div>
</form>

<?php  
include "config.php";
// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

  

echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $phno;
echo "<br>";
echo $role;
echo "<br>";

class Register{
  function Insert_user($conn,$username,$password,$phno){ 
      $sql = "INSERT INTO users (username,password,phno) VALUES ('$username', '$password', '$phno')";   
      if(mysqli_query($conn, $sql)){
         echo "Inserted into the table1<br>";  
    }
      
  }
  function Insert_role($conn,$username,$role){ 
      $records = mysqli_query($conn,"select id from users where username = '$username'");
      $data = mysqli_fetch_array($records);
      $id = $data['id'];
      echo $id;
      $sql = "INSERT INTO access (id,username,role) VALUES ('$id','$username','$role')";   
      if(mysqli_query($conn, $sql)){
         echo "Inserted into the table2<br>";  
      }  
  }
}
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
   
  
$insert = new Register();
$insert->Insert_user($conn,$username,$password,$phno);
$insert->Insert_role($conn,$username,$role);
}    
?>

</body>
</html>
