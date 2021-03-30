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
  background-color: blue;
  padding: 20px;
}
</style>
<script>
function validateForm() {
  var firstname = document.forms["myForm"]["firstname"];
  var lastname =  document.forms["myForm"]["lastname"];
  var email = document.forms["myForm"]["email"];
  var phno = document.forms["myForm"]["phno"];
  var date = document.forms["myForm"]["date"];
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  var tdate = yyyy + '-' + mm + '-' + dd; 
              
  if (firstname.value == "" ||  !/^[a-zA-Z-' ]*$/.test(firstname.value)) {
    window.alert("Firstname should contain letters and white space.");
    firstname.focus();
    return false;
  }
              
  if (lastname.value == "" ||  !/^[a-zA-Z-' ]*$/.test(lastname.value)) {
      window.alert("Lastname should contain letters and white space.");
      lastname.focus();
      return false;
  }
                          
  if (email.value == "" ||  !/([a-zA-Z0-9]+)\@([a-zA-Z]+)\.(com)/.test(email.value)) {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
  }
                
  if (phno.value == "" || !/^[6-9][0-9]{9}$/.test(phno.value)) {
        window.alert("Please enter a valid phone number.");
        phno.focus();
        return false;
  }
  
  if(date.value == "" || date.value !== tdate){  
      window.alert("Please enter today's date");
      date.focus();  
      return false;
  }
        return true;
           
}
</script> 
<body>

<div>

<form name ="myForm"  action = "abstract.php" onsubmit="return validateForm()" method="post">
<label for="firstname" style=" color: white">First Name</label>
<input type="text" name="firstname" placeholder="Enter your first name"><br><br>
<label for="lastname" style=" color: white">Last Name</label>
<input type="text" name="lastname" placeholder="Enter your last name"><br><br> 
<label for="email" style=" color: white">E-mail</label>
<input type="text" name="email" placeholder="Enter your email"><br><br>
<label for="phno" style=" color: white">Phno</label>
<input type="text" name="phno" placeholder="Enter your phno"><br><br>
<label for="date" style=" color: white">Date(yyyy-mm-dd)</label>
<input type="text" name="date" placeholder="Enter today's date"><br><br>
<input type="submit"  name ="submit" value="Submit" >
</form>
</div>
</body>
</html>

