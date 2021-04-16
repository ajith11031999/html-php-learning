<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin page </title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="bootcss.css">

</head>
<body>
<div class="container-fluid">
   <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
	   <div class="navbar-header">
	        <div class="navbar-brand">
                    <h4>Welcome <?php echo $login_session; ?></h4> 
                </div>	
	   </div>
					
       <ul class="nav navbar-nav navbar-right">
       <li><a href="logout.php" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
       </ul>
       </div><!-- /.navbar-collapse -->
       </div><!-- /.container-fluid -->
    </nav>  	
   <div class="container-fluid main-container">
 	<div class="col-md-2 sidebar">
	    <div class="row">
	     <!-- uncomment code for absolute positioning tweek see top comment in css -->
		<div class="absolute-wrapper"> </div>  
		  <!-- Menu -->
		   <div class="side-menu">
		      <nav class="navbar navbar-default" role="navigation">
			 <!-- Main Menu -->
		           <div class="side-menu-container">
		               <ul class="nav navbar-nav">
		               <li class="active"><a href="admin.php"><span class="glyphicon glyphicon-dashboard"></span>Home</a></li>
				<li><a href="admin.php"><span class="glyphicon glyphicon-plane"></span> Manage User</a></li>
				<li><a href="role.php"><span class="glyphicon glyphicon-cloud"></span> Manage role</a></li>
				</ul>
	      		   </div><!-- /.navbar-collapse -->
		      </nav>
		   </div>
              </div>  		
	 </div>
        <div class="col-md-8 content">
	   <div class="panel panel-default">
	      <div class="panel-body">
		<?php
 

$id = $_GET['id'];

$usernameErr = $passwordErr = $phnoErr = "";
$username = $password = $phno = $role = $role_id = "";

// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
   if($_POST['role']){
   $role = $_POST["role"];
   } 
}
class Update {
  
  public function Fetch($conn,$id){
     $qry = mysqli_query($conn,"select username,password,phno from users where id='$id' ");  // select query
    $data = mysqli_fetch_array($qry);             // fetch data

    return array($data['username'],$data['password'],$data['phno']);
  }
  public function Success($conn,$id ,$username ,$password ,$phno ,$role){
        $records = mysqli_query($conn,"SELECT role_id from role where role_name = '$role' ");
        $role_id = mysqli_fetch_array($records);
      $edit = mysqli_query($conn,"update users set username ='$username', password = '$password',phno = '$phno' , role_id = '$role_id[0]' where id='$id'");
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
   
  $update->Success($conn,$id ,$username ,$password ,$phno,$role);
}
if(isset($_POST['delete'])){ 
mysqli_query($conn,"DELETE FROM test WHERE id=$id");
mysqli_close($conn);
header("Location: admin.php");
}


?>

 <form class="form-horizontal" method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Edit user details</legend>
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
      <!-- Role-->
      <label class="control-label" for="role">Type of user:</label>
      <div class="controls">
        <select name="role" id="role">
        <?php
        $result = mysqli_query($conn,"SELECT role_name from role"); // fetch data from database
         while ($row = mysqli_fetch_array($result)) {
         echo "<option value='" . $row['role_name'] ."'>" . $row['role_name'] ."</option>";
         }
         ?>
        </select>
        <br><br>
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
        
</div>
	      </div>
	   </div>
	</div>
	
   </div>
</div>
					           
</body>	
</html>		
			
