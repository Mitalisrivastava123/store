<?php
session_start();
$personid = $_SESSION["personid"];
// echo $personid;

$idone = $_REQUEST["id"];
// echo $idone;
// die;
if(isset($_POST["logout"]))
{
  session_unset();
  session_destroy();
  echo "<script>window.location.href='userloginform.php'</script>";
}
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname="mydb";
// database connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
if ($conn->connect_error) {
}

//  $idsession = $_SESSION["id"];

$sql3 = "SELECT *  FROM register WHERE id ='$personid'";

$result1 = mysqli_query($conn, $sql3);
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
      $_SESSION["name"] = $row["name"];
     $_SESSION["email"]=$row["email"];
      $_SESSION["password"] = $row["password"];
   
    }
}
echo "<form action = '' method='post'>
<button type='submit' name='logout' style='background-color:#17a2b8;padding:10px;color:#fff;margin-top:10px;margin:auto;'>logout User</button></form>";
$sql1 = "SELECT * FROM products WHERE id = '$idone'";
$result1 = mysqli_query($conn, $sql1);
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
     //$_SESSION["id2"] = $row["id"];
   $_SESSION["product_name"] = $row["product_name"];
  
     $_SESSION["product_quantity"]=$row["product_quantity"];
      $_SESSION["product_price"] = $row["product_price"];
      $_SESSION["image"] = $row["image"];
    }
}
// die;

 $namesession1 = $_SESSION["product_name"];
 $pricesession = $_SESSION["product_price"];
  $imagesession = $_SESSION["image"];
 $sql2 = "INSERT INTO cart(pro_id,pro_name,pro_price,pro_image,userid) values('$idone', '$namesession1', '$pricesession','$imagesession','$personid')";
 if ($conn->query($sql2) === TRUE) {
  echo "<script>window.location.href='display.php'</script>";
  } 


