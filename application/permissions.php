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
<script>

function demoDisplay() {
  document.getElementById("container2").style.display = "block";
}
</script>
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
				<li><a href="role.php"><span class="glyphicon glyphicon-plane"></span> Manage role</a></li>
				<li><a onclick="demoDisplay()" id="user_manage"><span class="glyphicon glyphicon-cloud"></span> Manage permissions</a></li>
				</ul>
	      		   </div><!-- /.navbar-collapse -->
		      </nav>
		   </div>
              </div>  		
	 </div>
        <div class="col-md-8 content">
	   <div class="panel panel-default">
	      <div class="panel-body">
<div id="container2" style="display:none">
		<div class="row">
		<h2 class="text-center">Page details</h2>
		
	</div>
    
        <div class="row">
		
            <div class="col-md-12">
                 <form>
                 <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                       <tr>
         <th>Pages</th>
                   
<?php

$admin = $editor = $user = '';
      $records = mysqli_query($conn,"select role_name from role"); // fetch data from database
      while($data = mysqli_fetch_array($records)){
      ?> 
         
         <th><?php echo $data['role_name']; ?></th>  
      
      <?php
       }  ?>
       </tr>
       <?php
      
      $records = mysqli_query($conn,"select page_name from permissions where role_id = 1 "); // fetch data from database
      while($data = mysqli_fetch_array($records)){
          $page = $data['page_name']; 
          
                $record = mysqli_query($conn,"select role_id from permissions where page_name = '$page'  ");
                while($data = mysqli_fetch_array($record)){
                    if($data['role_id'] == 1){ $admin = "checked"; }
                    if($data['role_id'] == 2){ $editor = "checked"; }
                    if($data['role_id'] == 3){ $user = "checked";}
                    
                }  ?>
                      
                <tr>
                   <td><?php echo $page; ?></td>
                   <td><input type="checkbox" name="admin[]"  value = "<?php echo $page; ?>" <?php echo $admin; ?>></td>  
                   <td><input type="checkbox" name="editor[]" value = "<?php echo $page; ?>" <?php echo $editor; ?>></td>  
                   <td> <input type="checkbox" name="user[]"  value = "<?php echo $page; ?>" <?php echo $user; ?>></td>    
                 </tr>                  
                           
             <?php $admin = $editor = $user = '';
                 
       }  
       
       


?> 

</table>
<input type="submit" name="submit" Value="Submit"/>
<form>
<?php
if(isset($_POST['submit'])){
    $admin = array();
     if($_POST['admin']) {      
     foreach($_POST['admin'] as $selected) {
     $admin[] = $selected;  
     }
     print_r($admin);
      echo"<br>";
     }

  if($_POST['editor']) {
      $editor = array();
       $records = mysqli_query($conn,"delete from permissions where role_id = 2 ");
      foreach($_POST['editor'] as $selected) { 
       $records = mysqli_query($conn,"INSERT INTO permissions (page_name , role_id) VALUES ('$selected', '2') ");    
      $editor[] = $selected;
      }
       print_r($editor);
       echo"<br>";
   }

  if(!empty($_POST['user'])) {
       
      $user = array();
      $records = mysqli_query($conn,"delete from permissions where role_id = 3 ");
      foreach($_POST['user'] as $selected) {
      $records = mysqli_query($conn,"INSERT INTO permissions (page_name , role_id) VALUES ('$selected', '3') ");  
     $user[] = $selected;
      }
      print_r($user);
       echo"<br>";
  }

}
?>
                </table>
                
            </div>
        </div>
</div>
	      </div>
	   </div>
	</div>
</body>	
</html>	
