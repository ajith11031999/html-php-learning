<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<table border="2">
  <tr>
    <td>lS.No.</td>
    <td>First Name</td>
    <td>Last name</td>
    <td>Edit</td>
  </tr>
<?php

include "config.php";
class Database
{   
    function Insert($conn,$firstname, $lastname)
    {  
      $required = array($firstname, $lastname);

      // Loop over field names, make sure each one exists and is not empty

       foreach($required as $field) 
       {
        if (empty($field)) 
        {
          die("Error: All fields are required.");
        }
       }   
      $sql = "INSERT INTO sample (firstname,lastname) VALUES ('$firstname', '$lastname')";   
       echo "inserted successfully into the table<br>";    
            
        if(mysqli_query($conn, $sql))
        {
         echo "inserted into the table<br>";
        }
    }
    function Edit($conn)
    {     
      $records = mysqli_query($conn,"select * from sample"); // fetch data from database

      while($data = mysqli_fetch_array($records))
       {
      ?>
         <tr>
         <td><?php echo $data['id']; ?></td>
         <td><?php echo $data['firstname']; ?></td>
         <td><?php echo $data['lastname']; ?></td> 
         <td><a href="update.php?id=<?php echo $data['id']; ?>">Edit</a></td>   
         </tr>	

      <?php
       }
    }
  
  
}
$insert = new Database();
if(isset($_POST['submit']))
{
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"] ;
$insert->Insert($conn,$firstname, $lastname);
$insert->Edit($conn);
}

 
?> 

</table>

</body>
</html>



