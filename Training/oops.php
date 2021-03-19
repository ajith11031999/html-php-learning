<?php 

class calc { 
      
  function __call($name_of_function, $arguments) { 
              
     if($name_of_function == 'ans') { 
              
        switch (count($arguments)) { 
                      
          // If there is only one argument 
          case "1": 
            echo " single argument : ";     
            return  $arguments[0]; 
                          
          // IF two arguments then; 
          case "2": 
             echo " two arguments : " ;
             return $arguments[0]*$arguments[1];
              
        } 
     } 
  } 
} 
      
 
$ans = new calc;  
echo($ans->ans(2)); 
echo "<br>"; 
       
echo ($ans->ans(4, 2)); 
?> 
