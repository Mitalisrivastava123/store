<?php
session_start();
include "connection.php";?>
<!-- html start -->
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
    <!-- navbar start -->
<nav class="navbar navbar-expand-lg navbar-light nav1">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="userregisterform.php"><span class="dash1">User Registration Page</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><span class="dash1">User Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userloginform.php"><span class="dash1">User Login Page</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewproducts.php"><span class="dash1">Product Management </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ordermanagement.php"><span class="dash1">Order Management </span></a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>
<?php
$sql = "SELECT * FROM register";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3 class='mt-4'>All Users</h3>";
    echo "<table border='1px' class='table'>";
    echo "<th>User Id</th><th>User Name</th><th>User Email</th><th>User Address</th>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td>
     <td>".$row["name"]."</td>
     <td>".$row["email"]."</td>
     <td>".$row["address"]."</td></tr>";
  }
} 
?>