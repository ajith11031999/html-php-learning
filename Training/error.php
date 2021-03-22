<?php
//error handler function

function customError($errno, $errstr) {
  echo "<br>Error:</br> [$errno] $errstr";
}

//set error handler
set_error_handler("customError");

//trigger error
echo($one);
echo($two);
echo($three);
?>
