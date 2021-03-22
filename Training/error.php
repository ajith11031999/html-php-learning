<?php 
  
// If file is not present  
if( !file_exists("ajith.txt") ) { 
    die("File is not present"); 
} 
  
// If file is present 
else { 
    $file = fopen("ajith.txt", "w"); 
} 
?> 



