<?php

// Get POST parameters
$product_uid = $_POST['product_uid'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];

// Connect to database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Kibet#Rono5420";
$dbname = "PRODUCTS";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Update product price
$sql = "UPDATE Products SET Product_name='$product_name', Price='$price' WHERE Product_UID='$product_uid'";
$result = mysqli_query($conn, $sql);

// Update other products with same name
$sql = "UPDATE Products SET Price='$price' WHERE Product_name='$product_name' AND Product_UID != '$product_uid'";
$result = mysqli_query($conn, $sql);

// Return success or failure
if ($result) {
    $response = array('success' => true);
} else {
    $response = array('success' => false);
}
echo json_encode($response);

// Close database connection
mysqli_close($conn);

?>