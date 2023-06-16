<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="customer.css">
</head>
<body>
    <h1>SHOPPING CART</h1>
    <table>
        <tr>
            <th>Product_UID</th>
            <th>Product_name</th>
            <th>Price</th>
        </tr>

<?php

// Connect to MySQL database
include 'connection.php';

// Check if the clear button was clicked
if (isset($_POST['clear'])) {
    // Clear all items in the cart
    $sql = "DELETE FROM cart";
    header("Location: customer.php");
    $conn->query($sql);
    $conn->close();
    exit();
}

// If product_UID is submitted, add or remove the item from the cart
if (isset($_POST['product_UID'])) {
    // Get the product details from the database
    $product_UID = $_POST['product_UID'];
    $sql = "SELECT * FROM Products WHERE Product_UID = '$product_UID'";
    $result = $conn->query($sql);

    // If the product exists, add or remove it from the cart
    if ($result->num_rows > 0) {
        // Get the product details from the database
        $row = $result->fetch_assoc();
        $product_name = $row['Product_name'];
        $price = $row['Price'];
        $total_price = $price;

        $sql = "SELECT * FROM cart WHERE Product_UID = '$product_UID'";
        $result = $conn->query($sql);

        // If the product is already in the cart, remove it
        if ($result->num_rows > 0) {
            $sql = "DELETE FROM cart WHERE Product_UID = '$product_UID'";
            if ($conn->query($sql) === TRUE) {
                echo "Item removed from cart.";
            } 
            else {
                echo "Error removing item from cart: " . $conn;
            }
        } else {
            // If the product is not in the cart, add it
            $sql = "INSERT INTO cart (Product_UID, Product_name, Price) VALUES ('$product_UID', '$product_name', '$price')";
            if ($conn->query($sql) === TRUE) {
                echo "Item added to cart successfully.";
            } else {
                echo "Error adding item to cart: " . $conn;
            }
        }
    } else {
        echo "Product not found.";
    }
}

// Query the database for the cart items
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

// Loop through the cart items and display them in the table
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr id='item_" . $row['id'] . "'>";
        echo "<td>" . $row['Product_UID'] . "</td>";
        echo "<td>" . $row['Product_name'] . "</td>";
        echo "<td class='item_price'>" . $row['Price'] . "</td>";
        echo "<td><button onclick='removeItem(" . $row['id'] . ")' style='background-color: #ff0000; color: #fff; border: none; padding: 6px 12px; border-radius: 4px; font-size: 16px; cursor: pointer;'>Remove</button></td>";
        echo "</tr>";
    }

    // Calculate the total price of all items in the cart
    $sql = "SELECT SUM(Price) AS total_price FROM cart";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_price = $row['total_price'];

    // Display the total price
    echo "<tr style='background-color: grey;'>";
    echo "<td colspan='2' style='font-size: 1.2em;'>Total Price in Ksh:</td>";
    echo "<td id='total_price' style='font-size: 1.2em;'>" . $total_price . "</td>";
    echo "</tr>";
} else {
    
    // No items in the cart
    echo "<tr>";
    echo "<td colspan='5'>No items in the cart.</td>";
    echo "</tr>";
}

$conn->close();

?>
    </table>
    <form method="post" action="customer.php">
    <div style="display:flex; align-items:center; justify-content: center; gap: 8px;">
    <input type="text" id="product_UID" name="product_UID" placeholder="Input a Product UID">
    <button type="submit" style="background-color: orange; color: white; font-size: 16px; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">Add Product</button><br>
    <button type="" name="clear" style="background-color: red; color: white; font-size: 16px; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">Clear Cart</button>
  </div>
</form>

<script src = 'customer.js' ></script>

</body>
</html>