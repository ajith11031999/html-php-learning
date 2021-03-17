<?php
//fwrite
$myfile = fopen("open.txt", "w") or die("Unable to open file!");
$txt = "Hello World!\n";
fwrite($myfile, $txt);
$txt = "Good Day!\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
