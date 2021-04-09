<!DOCTYPE HTML>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
  
<body>


<?php
 
include "config.php";
$id = $_GET['id'];
$usernameErr = $passwordErr = $phnoErr = "";
$username = $password = $phno =  "";

// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

if (empty($_POST["username"]) || !preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/", $_POST["username"] )) {
    $usernameErr = "enter a valid username";
  } else {
    $username = $_POST['username'];
  }
    if (empty($_POST["password"]) || strlen($_POST["password"])<=8 || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/", $_POST["password"])) {
    $passwordErr = "Entered password is not strong";
  } else {
    $password = $_POST['password'];
  }
   if (empty($_POST["phno"]) || !preg_match("/^[6-9][0-9]{9}$/", $_POST["phno"])) {
    $phnoErr = "please enter a valid phone number";
  } else {
    $phno = $_POST['phno'];
      
  }


class Update {
  
  public function Fetch($conn,$id){
    $qry = mysqli_query($conn,"select username,password,phno from users where id='$id' "); // select query
    $data = mysqli_fetch_array($qry);             // fetch data

    return array($data['username'],$data['password'],$data['phno']);
  }
  public function Success($conn,$id ,$username ,$password ,$phno){
     
     
      $edit = mysqli_query($conn,"update users set username ='$username', password = '$password',phno = '$phno' where id='$id'");
      header("Location: http://localhost/admin.php");
  }
}   

$update = new Update(); 

$update->Fetch($conn,$id);
$detail = $update->Fetch($conn,$id);




if(isset($_POST['update'])){ // when click on Update button
 if(!empty($usernameErr or $passwordErr or $phnoErr)){
     echo "Not registered!!";
     return false;
    }
    
    $records = mysqli_query($conn,"select username from users where username != '$detail[0]'");
    while($data = mysqli_fetch_array($records)){     
         if($data['username'] == $username){
          echo "Not updated!!<br>";
          echo "username already exist"; 
          return false;
         }
       }  
   
  $update->Success($conn,$id ,$username ,$password ,$phno);
}
if(isset($_POST['delete'])){ 
mysqli_query($conn,"DELETE FROM test WHERE id=$id");
mysqli_close($conn);
header("Location: admin.php");
}


?>

 <form class="form-horizontal"  method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Edit form</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" value="<?php echo $detail[0] ?>" class="input-xlarge">
        <span class="error">* <?php echo $usernameErr;?></span>
        <p class="help-block"> Please enter the username</p>
      </div>
    </div>
 
  
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="text" id="password" name="password" value="<?php echo $detail[1] ?>" class="input-xlarge">
         <span class="error">* <?php echo $passwordErr;?></span>
        <p class="help-block">Password should be at least 8 characters and atmost 10 charecters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Phno -->
      <label class="control-label"  for="phno">Phno</label>
      <div class="controls">
        <input type="text" id="phno" name="phno" value="<?php echo $detail[2] ?>" class="input-xlarge">
        <span class="error">* <?php echo $phnoErr;?></span>
        <p class="help-block">Please enter the phone number</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button name="update"  value="update"class="btn btn-success">Update</button>
        <button name="delete"  value="delete"class="btn btn-success">Delete</button>
      </div>
    </div>
  </fieldset>
</form>

</body>
</html>
