<!DOCTYPE html>
<html>
<body>

<?php
class Info{
  public $name;
  public $age;

  function __construct($name, $age) {
    $this->name = $name; 
    $this->age = $age;
  }
  function __destruct() {
    echo "My name is {$this->name} and I am {$this->age} years old."; 
  }
}

$apple = new Info("Ajith",'22');
?>
 
</body>
</html>
