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
$sql = "DELETE  FROM  cart WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

  }
  header("Location:display.php");

?>