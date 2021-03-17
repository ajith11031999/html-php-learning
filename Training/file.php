<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// get session variables 
echo "My name is " . $_SESSION["name"] . ".<br>";
echo "My emailid is " . $_SESSION["email"] . ".";
?>

</body>
</html>
