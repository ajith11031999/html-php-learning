<!DOCTYPE HTML>
<html>  
<body>


<?php

// checking for errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

include "config.php";
$id = $_GET['id'];

class Update
{
  function Fetch($conn,$id)
  {
    $qry = mysqli_query($conn,"select firstname,lastname from sample where id='$id'"); // select query
    $data = mysqli_fetch_array($qry);            // fetch data
    return array($data['firstname'],$data['lastname']); 
  }
  function Update($conn,$id)
    {   

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $edit = mysqli_query($conn,"update sample set firstname='$firstname',lastname ='$lastname' where id='$id'");
      echo "sucessfully updated";
    }
}   

$update = new Update(); 
$id = $_GET['id'];

$update->Fetch($conn,$id);
$name = $update->Fetch($conn,$id);




if(isset($_POST['update'])) // when click on Update button
{
  $update->Update($conn,$id);
}


?>

<form method="post">
First name: <input type="text" name="firstname"  value="<?php echo $name[0] ?>"><br><br>
Last name: <input type="text" name="lastname"  value="<?php echo $name[1] ?>"><br><br>
<input type="submit"  name="update"  value="update">
</form>
</body>
</html>
