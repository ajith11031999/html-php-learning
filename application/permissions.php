<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>
<table border="2">
        <tr>
         <th>Pages</td>
<?php
include "config.php";

      $records = mysqli_query($conn,"select role_name from role"); // fetch data from database
      while($data = mysqli_fetch_array($records)){
      ?> 
         
         <th><?php echo $data['role_name']; ?></th>  
      
      <?php
       }  ?>
       </tr>
       <?php

      $records = mysqli_query($conn,"select page_name from permissions"); // fetch data from database
      while($data = mysqli_fetch_array($records)){
      ?>
         <tr>
         <td><?php echo $data['page_name']; ?></td> 
          <td><input type="checkbox" name="admin" ></td>  
          <td><input type="checkbox" name="editor" ></td>  
          <td><input type="checkbox" name="user" ></td>  
          <td><input type="checkbox" name="editor2" ></td>  
          
         </tr>	

      <?php
       }  


?> 

</table>

</body>
</html>
