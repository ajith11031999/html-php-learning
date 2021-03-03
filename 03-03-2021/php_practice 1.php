<?php
class Subjects {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

$maths = new Subjects();
$science = new Subjects();
$maths->set_name('Maths');
$science->set_name('science');

echo $maths->get_name();
echo "<br>";
echo $science->get_name();
?>
