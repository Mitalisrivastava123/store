<?php
session_start();
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "mydb";
// database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_REQUEST["id"];

 $product_name=$_POST["product_name"];
$product_quantity = $_POST["product_quantity"];
 $product_price = $_POST["product_price"];
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prod_id = $row["id"];
        $prod_name = $row["product_name"];
        $prod_quantity = $row["product_quantity"];
        $prod_price = $row["product_price"];
        $image1 = $row["image"];
    }
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   echo  $image = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}


?>


<?php
if (isset($_POST["update1"])) {
    $sqltwo = "UPDATE products set product_name ='" . $product_name . "',
    product_quantity='" . $product_quantity . "',product_price='" .  $product_price . "'
    where id='" . $id . "'";
    if ($conn->query($sqltwo) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;

    }
    if(empty($image))
 {
$sql = "UPDATE products set image ='" . $image1. "'";
}
else
{
    $sql = "UPDATE products set image = '".$image."'";
}

}


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
        <a class="nav-link" href="viewproducts.php"><span class="dash1">View Products</span></a>
      </li>
        <a class="nav-link " href="display.php"> <i class="bi bi-cart" style="margin-left:600px"></i><span class="dash1">My Orders</span><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"   color ="#fff" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></a>
    </ul>
  </div>
</nav>
    <section class="vh-100" style="background-color: #e4f0ff;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-xl-9">
                        <h1 class="text-primary mb-4">EDIT PRODUCT</h1>
                        <input type="submit" name="update1" value="update">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Product Name</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" class="form-control form-control-lg" placeholder="enter product name" name="product_name" value="<?php echo  $prod_name; ?>" />
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Product Quantity</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="number" class="form-control form-control-lg" placeholder="emter product quantity" name="product_quantity" value="<?php echo $prod_quantity; ?>" />
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Product Price</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="number" class="form-control form-control-lg" placeholder="enter product price" name="product_price" value="<?php echo $prod_price; ?>" />
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Upload Image</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="px-5 py-4">
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Upload Image</button>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

            </div>

    </section>

</body>

</html>