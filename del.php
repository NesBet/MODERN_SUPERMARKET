<!DOCTYPE html>
<html>
<head>
<div class="button-container">
<form action='home.php'>
<button class = 'button-1' type='submit'>BACK</button>
</form>
</div>
  <title> Products </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="del.css">
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "Kibet#Rono5420";
$dbname = "PRODUCTS";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT Product_UID, Product_name, Price FROM Products ORDER BY Product_name ASC";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>Product ID</th><th>Product Name</th><th>Price(Ksh)</th><th>Action</th></tr>";
while($row = mysqli_fetch_assoc($result)) {

    echo "<tr>";
    echo "<td data-label='Product ID'>".$row["Product_UID"]."</td>";
    echo "<td data-label='Product Name'>".$row["Product_name"]."</td>";
    echo "<td data-label='Price'>".$row["Price"]."</td>";
    echo "<td data-label='Action'><a href='delete.php?id=".$row["Product_UID"]."' onclick='return confirm(\"Are you sure you want to delete this product?\");'><button class='delete-button'></button></a></td>";
    echo "</tr>";
  
  }
echo "</table>";

mysqli_close($conn);

?>

<div class="button-container">
<form action='home.php'>
<button class = 'button' type='submit'> DONE </button>
</form>
</div>

</body>
</html>