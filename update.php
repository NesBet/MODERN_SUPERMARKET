<?php

if(isset($_POST['insert']))
{
    $HOSTNAME = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = 'Kibet#Rono5420';
    $DATABASE = 'PRODUCTS';  
    
    $Product_UID = $_POST['Product_UID'];
    $Product_name = $_POST['Product_name'];
    $Price = $_POST['Price'];

    $errors = array();
    if (strlen($Product_UID) != 16) {
        $errors[] = 'Product UID must be exactly 16 characters long.';
    }
    if (empty($Product_name)) {
        $errors[] = 'Product name is required.';
    }
    if (empty($Price)) {
        $errors[] = 'Price is required.';
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        
        $connect = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

        $query = "SELECT * FROM `Products` WHERE `Product_UID`='$Product_UID'";
        $result = mysqli_query($connect,$query);
        if (mysqli_num_rows($result) > 0) {
            header("Location: error.php");
            mysqli_free_result($result);
            mysqli_close($connect);
            exit();
          }
        
        $query = "INSERT INTO `Products`(`Product_UID`, `Product_name`, `Price`) VALUES ('$Product_UID','$Product_name','$Price')";
        $result = mysqli_query($connect,$query);

        
        if($result){
                    header("Location: return.php");
                    }
          else {
              header("Location: error.php");
              }
        mysqli_free_result($result);
        mysqli_close($connect);
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title> ADD DATA </title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="update.css">

</head>
<body>
    <form action="update.php" method="post">

        <label for="Product_UID">Product UID (16 characters):</label>
        <input type="text" name="Product_UID" id="Product_UID" required pattern=".{16}" title="Product UID must be exactly 16 characters long."><br>

        <label for="Product_name">Product Name:</label>
        <input type="text" name="Product_name" id="Product_name" required><br>

        <label for="Price">Price:</label>
        <input type="number" step="0.01" name="Price" id="Price" required><br>

        <input type="submit" name="insert" value="Add Data To Database">
    </form>
    <form method="post" action="home.php">
        <input type="submit" value="Back">
    </form>
</body>
</html>