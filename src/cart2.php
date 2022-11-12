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
    <h3>Product Added</h3>

    <?php

$id = $_SESSION["id"];
echo $id;

 $sql4 =  "SELECT *  FROM cart WHERE userid = '$id'";
 $result = mysqli_query($conn, $sql4);
 if ($result->num_rows > 0) {
   echo "<table border='1px'>";
   echo "<th>Id</th><th>Product Id</th><th>Product Price</th><th>Product Name</th><th>Product Image</th><th>UserId</th>";
     while($row = $result->fetch_assoc()) {
     echo "<tr><td>".$row["id"]."</td><td>".$row["pro_id"]."</td><td>".$row["pro_name"]."</td><td>".$row["pro_price"]."</td><td><img src='./uploads/" .$row["pro_image"]."' width='175' height='200'></td><td>".$row["userid"]."</td></tr>";
     }
     echo "</table>";
 }
    ?>
</body>
</html>