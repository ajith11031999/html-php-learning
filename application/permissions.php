<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>

<body>
<form method = "post">
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
</body>
</html>
