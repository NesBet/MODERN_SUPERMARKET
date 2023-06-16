<?php
$servername = "localhost";
$username = "root";
$password = "Kibet#Rono5420";
$dbname = "PRODUCTS";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>