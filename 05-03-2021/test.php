<!DOCTYPE HTML>
<html>  
<body>


<?php
  if (empty($_POST["firstname"]) 
  {
    $firstnameErr = "firstname is required";
  } 
  if (empty($_POST["lastname"]) 
  {
    $lastnameErr = "lastame is required";
  } 
  
  if (empty($_POST["email"]) 
  {
    $emailErr = "Email is required";
  } 
    
  if (empty($_POST["phno"]) {
    $phnoerr = "phno is required";
  } 

?>

<form action="output.php" method="post">
First name: <input type="text" name="firstname" >
<span class="error">* <?php echo $firstnameErr;?></span>
<br><br>
Last name: <input type="text" name="lastname">
<span class="error">* <?php echo $lastnameErr;?></span>
<br><br>
E-mail: <input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Phno: <input type="text" name="phno">
<span class="error">* <?php echo $phnoErr;?></span>
<br><br>
<input type="submit"  value="Submit">
</form>


</body>
</html>
