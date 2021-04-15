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
 $id = $_GET['role_id'];
$role = $roleErr = "";

// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["role"])) {
    $roleErr = "enter a new role name";
  } else {
    $role = $_POST["role"];
  }
}

class Update {
 
  
  public function Add($conn ,$id ,$role){
       
       $edit = mysqli_query($conn,"insert into role (role_name) value ('$role') ");
      header("Location: http://localhost/admin.php");
  }
}   

if(isset($_POST['add'])){ // when click on Update button 
   if(!empty($roleErr)){
     echo "Not added!!";
     return false;
    }
    else{ 
     $update = new Update();  
     $update->Add($conn,$id,$role);
    }
}

if(isset($_POST['delete'])){ 
echo $id;
mysqli_query($conn,"DELETE FROM role WHERE role_id = $id");
mysqli_close($conn);
header("Location: admin.php");
}


?>


 <form class="form-horizontal"  method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Edit role</legend>
    </div>

     <div class="control-group">
      <!-- add role -->
      <label class="control-label"  for="role">Role Name:</label>
      <div class="controls">
        
       <input type="text" id="role" name="role"  class="input-xlarge">
       <span class="error">* <?php echo $roleErr;?></span>
        <p class="help-block">Please enter the new role to be added</p>
      </div>
    </div>
   
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button name="add"  value="add"class="btn btn-success">Add</button>
       <button name="delete"  value="delete" class="btn btn-success">Delete</button>
      </div>
    </div>
  </fieldset>
</form>

	      </div>
	   </div>
	</div>
	<div class="col-md-2 content">
	  <div class="panel panel-default">
	     <div class="panel-heading">
		For Advertisement	
	     </div>
	  <div class="panel-body">
	    <h5>Advertisement Comes here</h5>
	    <br><br><br><br><br><br><br><br>
	    <br><br><br><br><br><br><br><br>
	    <br><br><br><br><br><br><br><br>
	    <br><br><br><br><br><br><br><br>
	    <br><br><br><br>
	  </div>
	</div>
     </div>
   </div>
</div>
					           
</body>	
</html>		
			
