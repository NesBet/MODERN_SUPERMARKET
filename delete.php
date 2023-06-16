<?php   
include 'connection.php';
 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `Products` WHERE Product_UID = '$id'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location: del.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?> 