<!DOCTYPE html>
<html>
<body>

<?php

//preg_match() - function will tell you whether a string contains matches of a pattern ,return 1 if match found else return 0
$str = "aspire systems";
$pattern = "/aspire/i";
echo preg_match($pattern, $str); 
echo"<br>";


//preg_match_all - function will tell you how many matches were found for a pattern in a string.
$str = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/in/i";
echo preg_match_all($pattern, $str);
echo"<br>";


//preg_replace - function will replace all of the matches of the pattern in a string with another string.
$str = "Good morning !";
$pattern = "/morning/i";
echo preg_replace($pattern, "Day", $str);
echo"<br>";


//grouping - use parentheses ( ) to apply quantifiers to entire patterns
$str = "banana is good for health.";
$pattern = "/ba(na){2}/i";
echo preg_match($pattern, $str);
echo"<br>";

?>

</body>
</html>

