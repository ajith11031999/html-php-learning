<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Welcome to godspeed</title>
      <link rel="stylesheet" href="welcomecss.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      
   </head>
   <body>
      <div class="wrapper">
         <header>
            <nav>
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="logo">
                  Godspeed
               </div>
               <div class="menu">
                  <ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="#">About</a></li>
                     <li><a href="#">Blog</a></li>
                     <li><a href="#">Contact</a></li>
                     <li><a href="#">Support</a></li>
                     <li><a href="logout.php">Logout</a></li>
                  </ul>
               </div>
            </nav>
         </header>
         <div class="content">
            <h1>Welcome <?php echo $login_session; ?></h1> 
         </div>
      </div>
   </body>
</html>
