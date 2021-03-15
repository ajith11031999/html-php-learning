<!DOCTYPE HTML>
<html> 
<style>
input[type=text], select {
  width: 100%;
  padding: 10px ;
  margin: 8px ;
  display: inline-block;
  border: 1px red;
  border-radius: 40px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 25%;
  background-color: red;
  color: white;
  padding: 10px;
  margin:auto;
  display:block;
  border: 1px red;
  border-radius: 40px;
  cursor: pointer;
  
}

input[type=submit]:hover {
  background-color: blue;
}

div {
  border-radius: 50px;
  width: 50%;
  margin:auto;
  display:block;
  background-color: black;
  padding: 20px;
}
</style> 
<body>

<div>
<form  action="class.php" method="post">
<label for="firstname" style=" color: white">First Name</label>
<input type="text" name="firstname" placeholder="Enter your first name"><br><br>
<label for="lastname" style=" color: white">Last Name</label>
<input type="text" name="lastname" placeholder="Enter your last name"><br><br> 
<label for="email" style=" color: white">E-mail</label>
<input type="text" name="email" placeholder="Enter your email"><br><br>
<label for="phno" style=" color: white">Phno</label>
<input type="text" name="phno" placeholder="Enter your phno"><br><br>
<input type="submit"  name ="submit" value="Submit" >
</form>
</div>
</body>
</html>


