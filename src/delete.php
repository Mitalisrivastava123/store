<?php
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname="mydb";
// database connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
if ($conn->connect_error) {
}

    $id = $_REQUEST["id"];
    echo $id;

$sql = "DELETE  FROM  cart WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  
  } else {
    echo "Error deleting record: " . $conn->error;
  }

?>