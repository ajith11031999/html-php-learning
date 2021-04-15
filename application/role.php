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
				<li><a onclick="demoDisplay()" id="user_manage"><span class="glyphicon glyphicon-cloud"></span> Manage role</a></li>
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
		<h2 class="text-center">Users details</h2>
		
	</div>
    
        <div class="row">
		
            <div class="col-md-12">

                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>	
                          <tr>
                               <th>ID</th>		
                               <th>Username</th>
                               <th>Delete role</th>
                          </tr>
                    </thead>
                             

<?php

class Store  {
     
    public function edit($conn){     
      $records = mysqli_query($conn,"select * from role"); // fetch data from database
      while($data = mysqli_fetch_array($records)){
      ?> <tbody>
         <tr>
         <td><?php echo $data['role_id']; ?></td>
         <td><?php echo $data['role_name']; ?></td> 
         <td><a href="roleform.php?role_id=<?php echo $data['role_id']; ?>">Delete</a></td>      
         </tr>	
	</tbody>
						

      <?php
       }
    }
}  


$obj = new Store();     
$obj->edit($conn);


?> 					
                </table>
                <a  href="roleform.php"  type="button" class="btn btn-info">Add new</a>
            </div>
        </div>
</div>
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
			
