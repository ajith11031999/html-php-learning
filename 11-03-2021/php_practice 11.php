<!DOCTYPE html>
<html>
<body>

<?php
$d = strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d = strtotime("next Thursday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d = strtotime("+6 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";
?>

</body>
</html>
