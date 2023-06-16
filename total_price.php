<?php
include 'connection.php';

// Calculate the total price of all items in the cart
$sql = "SELECT SUM(Price) AS total_price FROM cart";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_price = $row['total_price'];

// Return the updated total price as plain text
echo $total_price;

$conn->close();
?>
