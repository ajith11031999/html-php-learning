<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

class DB{
    private static $_instance = null;
    const host  = "localhost";  
    private $user="ajith";
    private $pass="Aspire@123";
    private $db="php";
 
    public function Connect(){ 
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
    public static function getObject(){
          if(!isset(self::$_instance)){
              self::$_instance = new DB();
              self::$_instance -> Connect();
    }
    return self::$_instance; 
     }
  }
  
$dbConn = DB::getObject();  

  
?>  
  
