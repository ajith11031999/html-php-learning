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

 interface Update{
    public function Fetch($conn,$id);
    public function Success($conn,$id);
}
class Change implements Update {
  
  public function Fetch($conn,$id){
    $qry = mysqli_query($conn,"select firstname,lastname,email,phno from users where id='$id' "); // select query
    $data = mysqli_fetch_array($qry);             // fetch data

    return array($data['firstname'],$data['lastname'],$data['email'],$data['phno']); 
  }
  public function Success($conn,$id){   

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $phno = $_POST['phno'];
      $edit = mysqli_query($conn,"update users set firstname='$firstname',lastname ='$lastname',email = '$email',phno = '$phno' where id='$id'");
      echo "sucessfully updated";
  }
}   

$update = new Change(); 

$update->Fetch($conn,$id);
$detail = $update->Fetch($conn,$id);




if(isset($_POST['update'])){ // when click on Update button
  $update->Success($conn,$id);
}


?>

<form method="post">
First name: <input type="text" name="firstname"  value="<?php echo $detail[0] ?>"><br><br>
Last name: <input type="text" name="lastname"  value="<?php echo $detail[1] ?>"><br><br>
E-mail: <input type="text" name="email" value="<?php echo $detail[2] ?>"><br><br>
Phno: <input type="text" name="phno" value="<?php echo $detail[3] ?>"><br><br>
<input type="submit"  name="update"  value="update">
</form>

</body>
</html>
