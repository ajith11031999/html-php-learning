<?php
session_start(); 
class dbConnect{
    private $host="localhost";
    private $user="ajith";
    private $pass="Aspire@123";
    private $db="php";
    
 public function Connect()
 {
  $conn=mysqli_connect($this->host, $this->user, $this->pass, $this->db);
   if($conn)
   {
    echo "Connected<br>";
   }
   return $conn;
 }
}
$dbConn = new dbConnect();
$conn = $dbConn->Connect();
