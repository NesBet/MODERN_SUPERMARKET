<?php
// Establish database connection
include 'connection.php';

// Execute SELECT query on Products table
$sql = "SELECT * FROM Products ORDER BY Product_name ASC";
$result = mysqli_query($conn, $sql);

// Fetch results as an array of associative arrays
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Encode results as JSON
$json = json_encode($rows);

// Set content type to application/json and send response
header('Content-Type: application/json');
echo $json;

// Close database connection
mysqli_close($conn);
?>