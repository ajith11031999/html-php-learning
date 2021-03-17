<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Setting session variables
$_SESSION["name"] = "Ajith";
$_SESSION["email"] = "ajith@gmail.com";
echo "Session variables are set.";
?>

</body>
</html>
