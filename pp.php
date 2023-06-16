<?php

// Get database connection
require_once("db_connection.php");
$db = getDb();

// Get product UID and new price
$product_uids = $_POST["product_uid"];
$new_price = $_POST["price"];

// Prepare statement to update price
$stmt = $db->prepare("UPDATE products SET Price = ? WHERE Product_UID = ?");
$stmt->bind_param("di", $new_price, $product_uid);

// Update prices for each product UID
$success = true;
foreach ($product_uids as $product_uid) {
    if (!$stmt->execute()) {
        $success = false;
    }
}

// Return success status as JSON
echo json_encode(array("success" => $success));

// Close statement and database connection
$stmt->close();
$db->close();