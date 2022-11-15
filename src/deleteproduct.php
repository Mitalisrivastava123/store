<?php
session_start();
include "connection.php";

$id = $_REQUEST["id"];
// echo $id;

$sql = "DELETE FROM products WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
 
  } else {
    
  }
header("Location:viewproducts.php");
?>
<!-- deleting data from product table -->