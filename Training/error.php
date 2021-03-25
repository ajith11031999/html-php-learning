<!DOCTYPE html>
<html>
<body>

<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

try {
   $x = "123456789";
   $y = "12345";
   echo $z;
   include ("nothing.php");
   add($x, $y);
   echo $x;
}
catch (exception $e) {
      echo $e->getMessage();
}

?> 

</body>
</html>
