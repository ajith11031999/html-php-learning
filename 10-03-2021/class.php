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
    <td>Email</td>
    <td>Phno</td>
    <td>Edit</td>
  </tr>
<?php

include "config.php";
class Database{
      
    function Insert($conn,$firstname,$lastname,$email,$phno){  
       echo $firstname;
      
      $sql = "INSERT INTO users (firstname,lastname,email,phno) VALUES ('$firstname', '$lastname', '$email', '$phno')";   
       echo "inserted successfully into the table<br>";    
            
        if(mysqli_query($conn, $sql)){
         echo "inserted into the table<br>";
        }
    }
    
    function Empty($firstname, $lastname,$email,$phno){
    if($firstname == ""){
      $firstnameErr = "* first name is not entered";
    }
    if($lastname == ""){
      $lastnameErr="* last name is not entered";
    }
    if($email == ""){
      $emailErr="* email is not entered";
    }
    if($phno == ""){
      $phnoErr="* phno  is not entered";
    }
    ?> 
      <h3>kindly enter the details in all fields as required </h3>
      <form action="class.php" method="post">
      First name: <input type="text" name="firstname" >
      <span class="error"> <?php echo $firstnameErr;?></span>
      <br><br>
      Last name: <input type="text" name="lastname">
      <span class="error"> <?php echo $lastnameErr;?></span>
      <br><br>
      E-mail: <input type="text" name="email">
      <span class="error"> <?php echo $emailErr;?></span>
      <br><br>
      Phno: <input type="text" name="phno">
      <span class="error"> <?php echo $phnoErr;?></span>
      <br><br>
      <input type="submit" name ="submit" value="Submit"><br><br>
      </form>
    <?php
     
    }
    function Edit($conn){     
      $records = mysqli_query($conn,"select * from users"); // fetch data from database
      ?><h3>Displaying all records from Database</h3>
        <h4>Incase of any change click the edit option</h4>
      <?php
      while($data = mysqli_fetch_array($records)){
      ?>
         <tr>
         <td><?php echo $data['id']; ?></td>
         <td><?php echo $data['firstname']; ?></td>
         <td><?php echo $data['lastname']; ?></td> 
         <td><?php echo $data['email']; ?></td> 
         <td><?php echo $data['phno']; ?></td>
         <td><a href="update.php?id=<?php echo $data['id']; ?>">Edit</a></td>   
         </tr>	

      <?php
       }
    }
  
  
}
$insert = new Database();
if(isset($_POST['submit'])){
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $email = $_POST['email'];
 $phno = $_POST['phno'];
   if($firstname == "" or $lastname =="" or $email == "" or $phno ==""){
     $insert->Empty($firstname, $lastname,$email,$phno);
   }
   else{
     $insert->Insert($conn,$firstname,$lastname,$email,$phno);
   }  
$insert->Edit($conn);
}

 
?> 

</table>

</body>
</html>



