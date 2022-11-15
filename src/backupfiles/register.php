<?php
include 'connection.php';
$name=$_POST["name"];
$email=$_POST["email"];
$address = $_POST["address"];
$password=$_POST["password"];
$cpassword = $_POST["cpassword"];

if($name == "" || $email == "" || $address == "" || $password == "")
{
    header("Location:userregisterform.php");
}
else
{
// inserting data into database
    $sql="INSERT INTO register(name,email,address,password) values('$name', '$email', '$address','$password')";

  if ($conn->query($sql) === TRUE) {
    
  } else {
   
  }
}
header("Location:userloginform.php");
  




?>
