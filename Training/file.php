<!DOCTYPE html>
<?php

$cookie_name = "user";
$cookie_value = "rain";
setcookie($cookie_name, $cookie_value, time() + (20), "/");
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
     echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
     echo "Cookie '" . $cookie_name . "' is set!<br>";
    
     echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

<p>Reload the page to see the value of the cookie.</p>

</body>
</html>
