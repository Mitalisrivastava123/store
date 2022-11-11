<?php
session_start();
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname="mydb";
// database connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
if ($conn->connect_error) {
}
if (isset($_GET["id"])) {
    $id = $_REQUEST["id"];
}
$sql = "SELECT id,name,email FROM register WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
         $_SESSION["id"] = $row["id"];
     $_SESSION["email"] = $row["email"];
        $_SESSION["name"] = $row["name"];
    }
}
 $idsession = $_SESSION["id"];
$namesession = $_SESSION["name"];
 $_emailsession = $_SESSION["email"];
$sql1 = "SELECT id,product_name,product_price,product_quantity,image FROM products WHERE id='$id'";
$result1 = mysqli_query($conn, $sql1);
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $_SESSION["id"] = $row["id"];
        $_SESSION["product_name"] = $row["product_name"];
        $_SESSION["product_quantity"]=$row["product_quantity"];
        $_SESSION["product_price"] = $row["product_price"];
        $_SESSION["image"] = $row["image"];
    }
}
 $idsession1 = $_SESSION["id"];
$namesession1 = $_SESSION["product_name"];
$quantitysession = $_SESSION["product_quantity"];
 $pricesession = $_SESSION["product_price"];
 $imagesession = $_SESSION["image"];

 $sql3 = "INSERT INTO cart (pro_id,pro_name,pro_price,pro_image) values('$idsession1', '$namesession1', '$quantitysession','$pricesession','$imagesession')";
 print_r($sql3);
 if (mysqli_query($conn, $sql3)) {
    echo "New record created successfully";
  } 