<?php
session_start();
include 'connection.php';

$id = $_SESSION["id"];
// echo $id;
$sql3 = "SELECT id,name,email  FROM register WHERE id ='$id'";
$result1 = mysqli_query($conn, $sql3);
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
     $_SESSION["id"] = $row["id"];
      $_SESSION["name"] = $row["name"];
     $_SESSION["email"]=$row["email"];
      $_SESSION["password"] = $row["password"];
    }
}
$idsession = $_SESSION["id"];
$namesession = $_SESSION["name"];
$_emailsession = $_SESSION["email"];


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