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
      <a class="nav-link" href="index.php"><span class=" dash1">Products Page</span></a>
    </li>

 
      <a class="nav-link " href="display.php"> <i class="bi bi-cart" style="margin-left:600px"></i><span class="dash1">My Orders</span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"   color ="#fff" class="bi bi-cart" viewBox="0 0 16 16">
<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></a>
   
  
  </ul>
</div>
</nav>
</body>
</html>
<?php
echo "<h1> Product Listing</h1>";
  $sql4 =  "SELECT *  FROM cart WHERE userid ='$personid'";
  $result = mysqli_query($conn, $sql4);
  if ($result->num_rows > 0) {

    echo "<table border='1px'>";
    echo "<th>Id</th><th>Product Id</th><th>Product Price</th><th>Product Name</th><th>Product Image</th><th>User Id</th><th>Delete Product</th>";
      while($row = $result->fetch_assoc()) {
     
      echo "<tr><td>".$row["id"]."</td><td>".$row["pro_id"]."</td><td>".$row["pro_name"]."</td><td>".$row["pro_price"]."</td><td><img src='./uploads/" .$row["pro_image"]."' width='175' height='200'></td>
      <td>".$row["userid"]."</td>
      <td><form action='' method='post'><input type='hidden' name='del' value=".$row["pro_quantity"]."><button type='submit' name='del1'>-</button>".$v1["quantity"]."<input type='hidden' name='plus' value=".$k1."><button type='submit' name='plus1'>+</button></form></td>
      
      <td><a href='delete.php?id=".$row["id"]."'>Delete </td></tr>";
      }
      echo "</table>";
  }


?>