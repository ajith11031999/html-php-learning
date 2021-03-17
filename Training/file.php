PHP file upload

<!DOCTYPE html>
<html>
<body>
<!-- html form for selecting file -->
<form action="file6.php" method="post" enctype="multipart/form-data">  
  Select File:  
    <input type="file" name="fileToUpload"/>  
    <input type="submit" value="Upload" name="submit"/>  
</form>

</body>
</html>


<?php  

$target_path = "/home/ajith/Documents/CSS";  
$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
  
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
  }  

?>  











