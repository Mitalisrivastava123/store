<?php 
session_start();
include "connection.php";
$personid = $_SESSION["personid"];
$productid =  $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
<!-- container start -->
<div class="w3-container">
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>
      <form class="w3-container" action="checkoutform.php" method="POST">
        <div class="w3-section">
          <label><b>Name</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Name" name="name">
          <label><b>Email</b></label>
          <input class="w3-input w3-border" type="email" placeholder="Enter Password" name="email">
          <label><b>Address</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Address" name="address">
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="placeorder">Place order</button>
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
        </div>
      </form>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
      </div>

    </div>
  </div>
</div>
<!-- fetching data from cart table -->
<?php
$sql4 =  "SELECT *  FROM cart WHERE userid ='$personid'";
$result = mysqli_query($conn, $sql4);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      $price = $price+ $row["pro_price"];
  }
  echo "<h2>Total Price:$price &#x20b9;</h2>";
}
// fetching data from register table
$sql = "SELECT * FROM register WHERE id ='$personid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   $userid = $row["id"];
     $name = $row["name"];
  $address =  $row["address"];
  }
  echo "<h2>User Name :$name </h2>";
  echo "<h2>Delivery Address:$address</h2>";
}
?>
 <button onclick="document.getElementById('id01').style.display='block'" style="margin-top:90px;background:#2874f0;color:#fff;padding:10px;">Add New Address</button>


</body>


</html>
