<!DOCTYPE html>
<html>
<body>

<?php
//array_diff - Compare the values of two arrays and return the differences
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");

$result=array_diff($a1,$a2);
print_r($result);
echo"<br>";


//arra_diff_assoc- 
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");
$result=array_diff_assoc($a1,$a2);
print_r($result);
echo"<br>";

//combine - combine two array of same size into keys and values
$fname=array("Peter","Ben","Joe");
$age=array("35","37","43");
//syntax : array_combine(keys, values)
$c=array_combine($fname,$age);
print_r($c);
echo"<br>";

//array_count_values - count occerence of each element in the array
$a=array("A","Cat","Dog","A","Dog");
print_r(array_count_values($a));
echo"<br>";

//array push - function inserts one or more elements to the end of an array.
$a=array("red","green");
array_push($a,"blue","yellow");
print_r($a);
echo"<br>";

//array reverse - Return an array in the reverse order:
$a=array("a"=>"Volvo","b"=>"BMW","c"=>"Toyota");
print_r(array_reverse($a));
echo"<br>";


//array_search-Search an array for the value "red" and return its key
$a=array("a"=>"red","b"=>"green","c"=>"blue");
echo array_search("red",$a);
echo"<br>";


//array shift - Remove the first element (red) from an array, and return the value of the removed element
$a=array("a"=>"red","b"=>"green","c"=>"blue");
echo array_shift($a)."<br>";
print_r ($a);
echo"<br>";

//array slice - Start the slice from the third array element, and return the rest of the elements in the array
$a=array("red","green","blue","yellow","brown");
print_r(array_slice($a,2));
echo"<br>";

//array splice - Remove elements from an array and replace it with new elements
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("a"=>"purple","b"=>"orange");
array_splice($a1,0,2,$a2);
print_r($a1);
echo"<br>";

//array sum - returns the sum of all the values in the array.
$a=array(5,15,25);
echo array_sum($a);
echo"<br>";

//array unshift - function inserts new elements to an array , new array values will be inserted in the beginning of the array.
$a=array("a"=>"red","b"=>"green");
array_unshift($a,"blue");
print_r($a);
echo"<br>";


?>

</body>
</html>

