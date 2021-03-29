<?php
class Info{
  public $name;
  public $age;
  public static $var = "Hello";

  function __construct($name, $age) {
    $this->name = $name; 
    $this->age = $age;
  }
  
      
    public static function func() {
        echo self::$var . ",";
    }
  
  function __destruct() {
    echo "My name is {$this->name} and I am {$this->age} years old."; 
  }
}

$apple = new Info("Ajith",'22');
Info::func();
?>
 
</body>
</html>
