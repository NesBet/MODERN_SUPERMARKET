<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css">
    <title>PRODUCTS</title>
</head>
<body>
    <div>
        <form action="update.php"><button class="button" type="submit"> UPDATE </button></form>
        <form action="del.php"><button class="button" type="submit"> DELETE </button></form>
        <form action="pricing.html"><button class="button" type="submit" > PRICING </button></form>
        <form action="logout.php"><button class="button" type="submit" > LOGOUT </button></form><br>
    </div>

    <?php
    $HOSTNAME = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = 'Kibet#Rono5420';
    $DATABASE = 'PRODUCTS';

    $con = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

    if(!$con){
        die(mysqli_connect_error());
    }

    $sql = "SELECT * FROM Products_view ORDER BY Product_name ASC";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
        {
           echo '<table> <tr> <th> Product Name </th> <th> Quantity </th> </tr>';
           while($row = mysqli_fetch_assoc($result)){
            echo '<tr> <td>' . $row["Product_name"] . '</td>
            <td> ' . $row["count"] . '</td> </tr>';
           }
           echo '</table>';
        }
        else
        {
            echo "0 results";
        }
        mysqli_close($con);

    ?><br>
</body>
</html>