
<?php

$valid_password = array ("ajith" => "12345");
$valid_user = array_keys($valid_password);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_user)) && ($pass == $valid_password[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}

// If valid user.
echo "<p>Welcome $user.</p>";
echo "<p>Congratulation, you are permitted.</p>";

?>
