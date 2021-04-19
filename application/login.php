<!DOCTYPE HTML>  
<html>
<head>
	<title>Login Page</title>
 
  	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
   
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="logcss.css">
</head>
<body>  

<?php
$usernameErr = $passwordErr ="";
$username = $password = ""; 

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

<div class="container">
 <h1>welcome to Godspeed.com</h1>
 <br><br>
   <div class="d-flex justify-content-center h-100">
      <div class="card">
	  <div class="card-header">
		<h3>Sign In</h3>
		<p><span class="error" style = "color: white">* required field</span></p>
	   </div>
	  <div class="card-body">
 	     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		   <div class="input-group form-group">
			<div class="input-group-prepend">
		        	<span class="input-group-text"><i class="fas fa-user"></i></span>
			</div>
			<input type="text" class="form-control" placeholder="username" name="username" required>
			<span class="error">* <?php echo $usernameErr;?></span>
		   </div>
		   <div class="input-group form-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-key"></i></span>
			</div>
			<input type="password" class="form-control" placeholder="password" name="password" required>
			<span class="error">* <?php echo $passwordErr;?></span>
		   </div>
					
		   <div class="form-group">
			<input type="submit" name = 'submit' value="Login" class="btn float-right login_btn">
		   </div>
	     </form>
	  </div>
	  <div class="card-footer">
		<div class="d-flex justify-content-center links">
			Don't have an account?<a href="regform.php">Sign Up</a>
		</div>			
          </div>
       </div>
    </div>
</div>


<?php
 session_start();
include "config.php";


echo $username;
echo "<br>";
echo $password;
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
       $_SESSION['username'] = $username;
       $records = mysqli_query($conn,"SELECT users.role_id FROM users WHERE  username = '$username' ");
       $data = mysqli_fetch_array($records);
       $role_id = $data['role_id'];
       
       $records = mysqli_query($conn,"SELECT page_name FROM permissions WHERE  role_id = '$role_id' "); 
       $data = mysqli_fetch_array($records);
       $page =$data['page_name'];
       header("location:$page");
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

