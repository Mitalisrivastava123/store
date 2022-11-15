<?php 
session_start();
include 'connection.php';

$_SESSION["personid"] = $_SESSION["id1"];
 $_SESSION["personid"];

?>
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
<body style="background:#e0dddd;">
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
        <a class="nav-link " href="display.php"> <i class="bi bi-cart" style="margin-left:600px"></i><span class="dash1">My Orders</span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"   color ="#fff" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></a>
    </ul>
  </div>
</nav>
<?php
echo "<h3 class='text-center'>PRODUCTS SHOP NOW</h3>";
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo '<div class="container">';
   echo '<div class="row">';
    while($row = $result->fetch_assoc())
    {
      echo "<div class='card col-4' style='background-color:#f6feff;color:#fff;margin:10px;width:340px'>";
      echo "<img class='card-img-top' src='./uploads/" .$row["image"]."' width='230' height='300px'>";
      echo "<div class='card-body'>";
      echo "<h4 class='card-text text-center'><span class='blog-title'>Product Name->" .$row["product_name"]. "</span></h4>";
        echo "<h4 class='card-text text-center'><span class='blog-title'>quantity->" .$row["product_quantity"]. "</span></h4>";
        echo "<h5 class='card-title text-center'><span class='blog-title'>Product Price-". $row["product_price"]."</span></h5>";
        echo "<a href='userloginform.php?id=".$row["id"]."' role='button' style='text-decoration:none;color:#fff;'><button class='btn1' type='submit' value=".$row["id"]." name='add'>Shop Now</button></a>";
     
      echo '</div>';
     echo '</div>';
       } 
       echo '</div>';
      }
 $_SESSION["productid"] = $row["id"];

?>
<!-- fetching data from product table -->
</body>
</html>