<?php
class Iteration
{
    public $var1 = 'one';
    public $var2 = 'two';
    public $var3 = 'three';
    protected $protected = 'four';
    private   $private   = 'five';

    function iterate() {
       echo "Iteration::iterate:"."<br>";
       foreach ($this as $key => $value) {
           print "$key => $value"."<br>";
       }
    }
}

$class = new Iteration();



$class->iterate();

?>
