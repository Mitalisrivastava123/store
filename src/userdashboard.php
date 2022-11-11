<?php 
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo "<h3>PRODUCTS SHOP NOW</h3>";
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1px'>";
    echo "<th>Id</th><th>Product Name</th><th>Product Quantity</th><th>Product Price</th><th>Product Image</th><th>Product Cart</th>";
    while($row = $result->fetch_assoc())
    {
    echo "<tr><td>".$row["id"]."</td><td>".$row["product_name"]."</td><td>".$row["product_quantity"]."</td><td>".$row["product_price"]."</td><td><img src='./uploads/" .$row["image"]."' width='175' height='200'></td><td><a href='cart.php?id=".$row["id"]."'><button type='submit' value=".$row["id"]." name='add'>Add to Cart</button></a></td></tr>";
    }
    echo "</table>";
}


?>
</body>
</html>