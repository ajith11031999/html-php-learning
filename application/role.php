<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin page </title>
  <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            
            <div id="sidebar" class="well sidebar-nav">
                <h5><i class="glyphicon glyphicon-home"></i>
                    <small><b>MANAGEMENT</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Add</a></li>
                    <li><a href="#">Search</a></li>
                </ul>
                <h5><i class="glyphicon glyphicon-user"></i>
                    <small><b>USERS</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">List</a></li>
                    <li><a href="admin.php">Manage users</a></li>
                </ul>
                <h5><i class="glyphicon glyphicon-user"></i>
                    <small><b>Role</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">List</a></li>
                    <li><a href="role.php">Manage role</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Content Here -->
        </div>
    </div>
</div>
<div class="container">
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
                               <th>Role</th>
                               <th>Edit</th>
                               <th>Delete</th>
                          </tr>
                    </thead>
                             

<?php

class Store  {
     
    public function edit($conn){     
      $records = mysqli_query($conn,"select * from access"); // fetch data from database
      while($data = mysqli_fetch_array($records)){
      ?> <tbody>
         <tr>
         <td><?php echo $data['id']; ?></td>
         <td><?php echo $data['username']; ?></td>
         <td><?php echo $data['role']; ?></td>  
         <td><a href="roleform.php?id=<?php echo $data['id']; ?>">Edit</a></td>   
          <td><a href="roleform.php?id=<?php echo $data['id']; ?>">Delete</a></td>   
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
            </div>
        </div>
        
         <p>
        <a href="logout.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
      </p> 
</div>

</body>
    
<html>    
