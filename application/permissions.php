<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>
<table border="2">
        <tr>
         <th>Pages</th>
<?php
include "config.php";
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
                    if($data['role_id'] == 1){ $admin = "checked";}
                    if($data['role_id'] == 2){ $editor = "checked";}
                    if($data['role_id'] == 3){ $user = "checked";}
                    
                }  ?>
                      
                <tr>
                   <td><?php echo $page; ?></td>
                   <td><input type="checkbox" name="admin"<?php echo $admin; ?>></td>  
                   <td><input type="checkbox" name="admin" <?php echo $editor; ?>></td>  
                   <td> <input type="checkbox" name="admin"<?php echo $user; ?>></td>    
                 </tr>                  
                           
             <?php $admin = $editor = $user = '';
       }  
       


?> 
</table>

</body>
</html>
