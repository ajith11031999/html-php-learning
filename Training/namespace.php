<?php namespace combine;
  
  include 'namespace.php';
  include 'namespace2.php';
  use MyNamespace1 as first;
  use MyNamespace2 as second;
  echo first\hello(), "<br />\n";
  echo second\hello(), "<br />\n";
?>
  
  
