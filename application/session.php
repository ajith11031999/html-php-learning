<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['username'];
   
   $ses_sql = mysqli_query($conn,"select username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
    $pages = array();
       $records = mysqli_query($conn,"SELECT users.role_id FROM users WHERE  username = '$user_check' ");
       $data = mysqli_fetch_array($records);
       $role_id = $data['role_id'];
       
       $records = mysqli_query($conn,"SELECT page_name FROM permissions WHERE  role_id = '$role_id' "); 
       while($data = mysqli_fetch_array($records)){
       $pages[] = $data['page_name'];
       }
      
       $link = $_SERVER['REQUEST_URI'];
       $url = str_replace("/","","$link");
       
       if( !in_array( "$url" ,$pages ) ) {
            header("location:login.php");
        } 
       
   if(!isset($_SESSION['username']) ){
      header("location:login.php");
      die();
   }
?>
