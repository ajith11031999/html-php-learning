<!DOCTYPE html>
<html>
<body>

<?php
class Info{
  public $name;
  public $age;
  public static $var = "Hello";
  const CONST = "Good Day!, ";
  function __construct($name, $age) {
    $this->name = $name; 
    $this->age = $age;
  }
     
  function __destruct() {
    echo "My name is {$this->name} and I am {$this->age} years old."; 
  }
  
  
  public static function func() {
        echo self::$var . ", ";
    }
  protected function cnst() {
    echo self::CONST;
  }  
}

class Inherit extends Info{
public function clg() {
    $this->cnst();
    echo "World . ";    
  }

}

$obj = new Inherit("Ajith",'22');
Info::func();
$obj->clg(); 

?>
 
</body>
</html>
