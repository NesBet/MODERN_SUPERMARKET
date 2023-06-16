<?php

        // Check if the item ID is set
if (isset($_GET['id'])) {

    // Get the item ID and sanitize it
    $item_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    include 'connection.php';

    // Prepare the SQL query to delete the item from the cart
    $sql = "DELETE FROM cart WHERE id = ?";

    // Prepare the statement and bind the parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $item_id);

    // Execute the statement
        if ($stmt->execute()) {
                // Item successfully removed from the cart
                echo "<p>Item successfully removed from the cart.</p>";
        } else {
            // Error removing the item from the cart
            echo "<p>Error removing the item from the cart: " . $conn->error . "</p>";
            }

        // Close the statement and the connection
        $stmt->close();
        $conn->close();

        echo '<a href="customer.php"><button>Back to Cart</button></a>';

    } else {
        // Item ID not set
        echo "<p>Item ID not set.</p>";
        echo '<a href="customer.php"><button>Back to Cart</button></a>';
        }

?>