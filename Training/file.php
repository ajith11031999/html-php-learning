<!DOCTYPE html>
<html>
<body>

<?php
$myfile = fopen("meeting.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file

echo fgetc($myfile);

fclose($myfile);
?>

</body>
</html>
