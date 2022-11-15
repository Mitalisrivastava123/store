<?php
session_start();
include "connection.php";

$ordername = $_POST["orderstatus"];

$orderid = $_POST["order"];

$personid = $_SESSION["personid"];
// echo $personid;
$sql = "UPDATE cart  SET orderstatus='".$ordername ."'where id = $orderid";
if (mysqli_query($conn, $sql)) {
} 
header("Location:ordermanagement.php");

?>