<!DOCTYPE html>
<html>
<body>

<?php

// addcslashes - function returns a string with backslashes in front of the specified characters.
$str = "Welcome to my humble Homepage!";
echo $str."<br>";
echo addcslashes($str,'m')."<br>";
echo addcslashes($str,'H')."<br>";


//chop - function removes whitespaces or other predefined characters from the right end of a string.
$str = "Hello World!";
echo $str . "<br>";
echo chop($str,"World!");
echo"<br>";


//strcmp - function compares two strings.This function returns: 1)0 - if the two strings are equal. 2)<0 - if string1 is less than string2. 3)>0 - if string1 is greater than string2.
echo strcmp("Hello world!","Hello world!");
echo"<br>";


//str_split - function splits a string into an array.
print_r(str_split("Hello"));
echo"<br>";


//strlen - function returns the length of a string.
echo strlen("Hello");
echo"<br>";

//substr_count - function counts the number of times a substring occurs in a string.
echo substr_count("Hello world. The world is nice","world");
echo"<br>";

//strrev - function reverses a string.
echo strrev("Hello World!");
echo"<br>";

?>

</body>
</html>
