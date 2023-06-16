<?php

// Get mysqli connection to database
function getDb() {
    $host = "localhost";
    $username = "root";
    $password = "Kibet#Rono5420";
    $database = "PRODUCTS";
    $db = new mysqli($host, $username, $password, $database);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    return $db;
}
