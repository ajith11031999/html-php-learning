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
$usernameErr = "";
$username = $role = "";

// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if($_POST['role']){
   $role = $_POST["role"];
   } 
}

class Update {
  
  public function Fetch($conn,$id){
    $qry = mysqli_query($conn,"select username,role from access where id='$id' "); // select query
    $data = mysqli_fetch_array($qry);             // fetch data

    return array($data['username'],$data['role']);
  }
  public function Success($conn,$id ,$role){
       
    echo $role;
  }
}   

$update = new Update(); 

$update->Fetch($conn,$id);
$detail = $update->Fetch($conn,$id);




if(isset($_POST['update'])){ // when click on Update button 
   
  $update->Success($conn,$id,$role);
}

?>


 <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Edit form</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="<?php echo $detail[0] ?>" class="input-xlarge" readonly>

      </div>
    </div>
 
  
    <div class="control-group">
      <!-- Role-->
   
      
      <label class="control-label" for="role">Type of user:</label>
      <div class="controls">
        <select name="role" id="role">
        <option value="anonymous">anonymous user</option>
        <option value="editor">editor</option>
        <option value="admin">admin</option>
        </select>
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
