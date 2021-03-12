<?php
   
include "config.php";
   $sql = 'SELECT users.id, sample.firstname FROM sample,users WHERE sample.id = users.id';
   
   if($result = mysqli_query($conn, $sql)) {
      if(mysqli_num_rows($result) > 0) {
         
         
         while($row = mysqli_fetch_array($result)){
           echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. "<br>";
         }
        
         
         mysqli_free_array($result);
         
      } else {
         echo "No records matching your query were found.";
        }
  }   else {
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      }
   mysqli_close($conn);
?>
