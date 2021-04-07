<!DOCTYPE html>
<html>
<head>
  <title>Admin page </title>
</head>
<body>
<h3>Welcome admin</h3>
<h4>Incase of any change click the edit option</h4>
      
<table border="2">
  <tr>
    <td>Id</td>
    <td>User Name</td>
    <td>Password</td>
    <td>Phno</td>
    <td>Date</td>
    <td>Edit</td>
  </tr>
<?php


include "config.php";




class Store  {
     
    public function edit($conn){     
      $records = mysqli_query($conn,"select * from users"); // fetch data from database
      while($data = mysqli_fetch_array($records)){
      ?>
         <tr>
         <td><?php echo $data['id']; ?></td>
         <td><?php echo $data['username']; ?></td>
         <td><?php echo $data['password']; ?></td> 
         <td><?php echo $data['phno']; ?></td> 
         <td><?php echo $data['modified_date']; ?></td>
         <td><a href="adminform.php?id=<?php echo $data['id']; ?>">Edit</a></td>   
         </tr>	

      <?php
       }
    }
}  


$obj = new Store();     
$obj->edit($conn);


?> 

</table>

</body>
</html>
