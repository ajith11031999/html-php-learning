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
		<h2 class="text-center">Users details</h2>
	</div>
    
        <div class="row">
		
            <div class="col-md-12">

                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>	
                          <tr>
                               <th>ID</th>		
                               <th>Username</th>
                               <th>Password</th>
                               <th>Phno</th>
                               <th>Date</th>
                               <th>Edit</th>
                               <th>Delete</th>
                          </tr>
                    </thead>


<?php

include "config.php";

class Store  {
     
    public function edit($conn){     
      $records = mysqli_query($conn,"select * from users"); // fetch data from database
      while($data = mysqli_fetch_array($records)){
      ?> <tbody>
         <tr>
         <td><?php echo $data['id']; ?></td>
         <td><?php echo $data['username']; ?></td>
         <td><?php echo $data['password']; ?></td> 
         <td><?php echo $data['phno']; ?></td> 
         <td><?php echo $data['modified_date']; ?></td>
         <td><a href="adminform.php?id=<?php echo $data['id']; ?>">Edit</a></td>   
          <td><a href="adminform.php?id=<?php echo $data['id']; ?>">Delete</a></td>   
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
</div>

</body>
    
<html>    
