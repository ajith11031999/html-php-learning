<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

class DatabaseConfig{
    const host  = "localhost";  
    private $user="ajith";
    private $pass="Aspire@123";
    private $db="webdev";
 
    
 public function Connect()
 { 
  try{
       if ($conn=mysqli_connect(self::host, $this->user, $this->pass, $this->db)){
        echo"connected";
        return $conn;
        
       }
       else{
         throw new Exception('Unable to connect');
       }
     }
  catch(Exception $e){
    echo $e->getMessage();
     }

 }
}
  
$dbConn = new DatabaseConfig();
$conn =$dbConn->Connect();

?>






