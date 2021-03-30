<!DOCTYPE html>
<html>
<head>
  <title>create a Excel file and insert form data from database</title>
</head>
<body>

<table>
  <tr>
    <td>Sl.No.</td>
    <td>First Name</td>
    <td>Last name</td>
    <td>Email</td>
    <td>Phno</td>
    <td>Date</td>
  </tr>
<?php
include "auto.php";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename= excel.xls");

class Excel{
public function fetch($conn){     
      $records = mysqli_query($conn,"select * from users where date>'2021-03-27' and date<'2021-03-30'"); // fetch data from database
      while($data = mysqli_fetch_array($records)){
      ?>
         <tr>
         <td><?php echo $data['id']; ?></td>
         <td><?php echo $data['firstname']; ?></td>
         <td><?php echo $data['lastname']; ?></td> 
         <td><?php echo $data['email']; ?></td> 
         <td><?php echo $data['phno']; ?></td> 
         <td><?php echo $data['date']; ?></td>  
         </tr>	

      <?php
       }
    }
}
$obj = new Excel();    
$obj->fetch($conn);
?>
