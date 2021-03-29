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

abstract class Abstract{
    abstract public function insert($conn,$firstname,$lastname,$email,$phno);
    abstract public function emty($firstname, $lastname,$email,$phno);
    abstract public function edit($conn);
}

class Store extends Abstract {

    public function insert($conn,$firstname,$lastname,$email,$phno){  
       echo $firstname;

      $sql = "INSERT INTO users (firstname,lastname,email,phno) VALUES ('$firstname', '$lastname', '$email', '$phno')";   
       echo "inserted successfully into the table<br>";    

        if(mysqli_query($conn, $sql)){
         echo "inserted into the table<br>";
        }
    }

    public function emty($firstname, $lastname,$email,$phno){
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
     
    <?php
      include "newresample.php";
    }
    
 
       
    public function edit($conn){     
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
         <td><a href="interface.php?id=<?php echo $data['id']; ?>">Edit</a></td>   
         </tr>	

      <?php
       }
    }
}  


$obj = new Store();
if(isset($_POST['submit'])){
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $email = $_POST['email'];
 $phno = $_POST['phno'];
   if($firstname == "" or $lastname =="" or $email == "" or $phno ==""){
     $obj->emty($firstname, $lastname,$email,$phno);
   }
   else{
     $obj->insert($conn,$firstname,$lastname,$email,$phno);
   }    
$obj->edit($conn);
}


?> 

</table>

</body>
</html>
