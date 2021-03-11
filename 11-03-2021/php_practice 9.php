<!DOCTYPE html>
<html>
<body>

<?php

//comparision Operators

//1)equal

$x = 1103;  
$y = "1103";
var_dump($x == $y); // returns true because values are equal
echo"<br>";

//2)identical

$x = 100;  
$y = "100";
var_dump($x === $y); // returns false because types are not equal
echo"<br>";

//3)not equal

$x = 1103;  
$y = "1103";
var_dump($x != $y); // returns false because values are equal
$x = 1103;  
$y = "1103";
var_dump($x <> $y); // returns false because values are equal
echo"<br>";

//4)not identical

$x = 1103;  
$y = "1103";
var_dump($x !== $y); // returns true because types are not equal
echo"<br>";

//5)grater than or equal to
$x = 110399;
$y = 110399;
var_dump($x >= $y); // returns true because $x is greater than or equal to $y
echo"<br>";


//6)lesser than or equal to
$x = 110399;
$y = 110399;
var_dump($x <= $y); // returns true because $x is lesser than or equal to $y
echo"<br>";


//7)spaceship
$x = 11;  
$y = 1999;

echo ($x <=> $y); // returns -1 because $x is less than $y
echo "<br>";

$x = 110399;  
$y = 110399;

echo ($x <=> $y); // returns 0 because values are equal
echo "<br>";

$x = 1103;  
$y = 99;

echo ($x <=> $y); // returns +1 because $x is greater than $y
echo"<br>";



?>  

</body>
</html>

