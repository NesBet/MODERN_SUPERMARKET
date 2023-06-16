<?php   
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "Kibet#Rono5420";
$dbname = "PRODUCTS";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['product_uid']) && isset($_POST['new_name']) && isset($_POST['new_price'])) {
  $id = $_POST['product_uid'];
  $new_name = $_POST['new_name'];
  $new_price = $_POST['new_price'];

  $query = "UPDATE Products SET Product_name='$new_name', Price='$new_price' WHERE Product_UID='$id'";
  $run = mysqli_query($conn, $query);

  if ($run) {  
    header('location: pricing.php');  
  } else {  
    echo "Error updating product: " . mysqli_error($conn);  
  }  
} else {
  echo "Error: Missing parameters";
}