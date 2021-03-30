<?php

include "config.php";

$result=mysqli_query($conn, "Select * from users");

$xml = new DOMDocument("1.0");
  
$xml->formatOutput=true;
 
$users=$xml->createElement("users");
$xml->appendChild($users);

while($row=mysqli_fetch_array($result)){
    $user=$xml->createElement("user");
    $users->appendChild($user);
      
    $id=$xml->createElement("id", $row['id']);
    $user->appendChild($id);
      
    $fname=$xml->createElement("firstname", $row['firstname']);
    $user->appendChild($fname);
    
    $lname = $xml->createElement("lastname", $row['lastname']);
    $user->appendChild($lname);
      
    $email=$xml->createElement("email", $row['email']);
    $user->appendChild($email);
      
    $phno=$xml->createElement("phonenumber", $row['phno']);
    $user->appendChild($phno);
      
    $date=$xml->createElement("date", $row['date']);
    $user->appendChild($date);
      
      
}
echo "<xmp>".$xml->saveXML()."</xmp>";
$xml->save("report.xml");


?>
