<?php
include 'connection.php';
$product_name=$_POST["product_name"];

$product_quantity = $_POST["product_quantity"];

$product_price = $_POST["product_price"];

$image = $_POST["image"];

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
     $image = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
$sql = "INSERT INTO products(product_name,product_quantity,product_price,image)VALUES('$product_name','$product_quantity','$product_price','
$image')";
  if (mysqli_query($conn, $sql)) {  
 echo "Data Stored Successfully";
      } 
?>