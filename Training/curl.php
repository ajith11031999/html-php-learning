<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

function get_data($url) {
$ch = curl_init();
$timeout = 5;
$username = 'ajith';       
$password = '12345';                      
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");    
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
$url = "http://localhost/sample.php";
$data = get_data($url);
echo "$data";

?>
