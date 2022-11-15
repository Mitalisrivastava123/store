<?php
session_start();
include 'connection.php';
$personid = $_SESSION["personid"];
// echo $personid;
$productid =  $_SESSION["id"]; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light nav1">

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link ms-5" href="admindashboard.php"><span class="dash1">Admin Dashboard</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userloginform.php"><span class="dash1">User Login Page</span></a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="userregisterform.php"><span class="dash1">User Registration Page</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php"><span class=" dash1">Shop Page</span></a>
        </li>
        <a class="nav-link " href="display.php"> <i class="bi bi-cart" style="margin-left:600px"></i><span class="dash1">My Orders</span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" color="#fff" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </svg></a>
      </ul>
    </div>
  </nav>

</body>

</html>
<?php
echo "<form action='cartcheckout.php' method='post'><button type='submit' name='cartcheckout' class='mt-4 update1' style='float:right'>Cart Checkout</button></form>";
echo "<h1> Orders List</h1>";
$sql4 =  "SELECT *  FROM cart WHERE userid ='$personid'";
$result = mysqli_query($conn, $sql4);
if ($result->num_rows > 0) {
  echo "<table border='1px' class='table'>";
  echo "<th>Id</th><th>Product Id</th><th>Product Name</th><th>Product Price</th><th>Product Image</th><th>Quantity</th><th>Delete Product</th><th>Order Status</th>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["pro_id"] . "</td><td>" . $row["pro_name"] . "</td><td>" . $row["pro_price"] . "</td><td><img src='./uploads/" . $row["pro_image"] . "' width='175' height='200'></td> 
      <td><form action='' method='post'>
      <input type='hidden' name='del' value=" . $row["id"] . ">
      <button type='submit' name='del1'>-</button>" . $row["quantity"] . "<input type='hidden' name='plus' value=" . $row["id"] . ">
      <button type='submit' name='plus1'>+</button></form></td>
      <td><a href='delete.php?id=" . $row["id"] . "' class='delete1'>Delete</td>
      <td>".$row["orderstatus"]."</td>"; 
   
      $price = $price+ $row["pro_price"];

      ?>
      <?php 
    $iduse = $row["id"];
     $quan = $row["quantity"];
    if (isset($_POST["plus1"])) {
      $m2 = $_POST["plus"];
      if ($iduse == $m2) {
        $quan =  $row["quantity"] += 1;
        $sql = "UPDATE cart set quantity ='" . $quan . "' where id = $iduse";
        $m3 = $conn->query($sql);
      }
    }
    if (isset($_POST["del1"])) {
       $m4 = $_POST["del"];
      if($row["quantity"]>1 && $row["id"] == $m4)
      {
      $quan =  $row["quantity"] -= 1;
      $sqlone = "UPDATE cart set quantity ='" . $quan . "' where id = $m4";
      $m5 = $conn->query($sqlone);
      }
      else if($row["quantity"]<=1 && $row["id"] == $m4)
      {
        $sqltwo = "DELETE  FROM  cart WHERE id='$m4'";
        $m6 = $conn->query($sqltwo);
      }
    }
  }
  echo "<h3>Total Price:$price &#x20b9;</h3>";
}
echo "</table>";





?>