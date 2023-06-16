<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>START</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: url("start.webp") no-repeat center center fixed;
            background-size: cover;
        }
        
        button {
            background-color: darksalmon;
            border: red;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 150px;
            cursor: pointer;
        }

        button:hover {
            background-color: orangered;
        }
    </style>
</head>
<body>

<?php
include 'connection.php';
if (isset($_POST['start-shopping'])) {
    $sql = "DELETE FROM cart";
    $conn->query($sql);
    header("Location: customer.php");
    $conn->close();
    exit();
    }
?>
    <form action="start.php" method="post">
        <button type="submit" name="start-shopping">START SHOPPING</button>
    </form>
</body>
</html>