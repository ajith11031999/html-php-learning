<?php

include "config.php";
class Database
{   
    function Insert($conn,$firstname, $lastname)
    {     
      $sql = "INSERT INTO sample (firstname,lastname) VALUES ('$firstname', '$lastname')";   
       echo "inserted successfully into the table<br>";    
       echo"firstname is $firstname<br>";
       echo"lastname is $lastname<br>";       
        if(mysqli_query($conn, $sql))
        {
         echo "inserted into the table<br>";
        }
    }
    function Update($conn)
    {     
      $sql = "UPDATE sample SET firstname='Ajith' WHERE id=2";
      if ($conn->query($sql) === TRUE) 
      {
        echo "Record updated successfully";
      } 
      else 
      {
         echo "Error updating record: " . $conn->error;
      }
    }
  
  
}
$insert = new Database();
if(isset($_POST['submit']))
{
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"] ;
$insert->Insert($conn,$firstname, $lastname);
}
if(isset($_POST['update']))
{
$insert->Update($conn);
}
 
?> 








