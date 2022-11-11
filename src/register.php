<?php
include 'connection.php';
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$cpassword = $_POST["cpassword"];
if($name == "" || $email == "" || $password == "")
{
    header("Location:index.php");
}
else
{
// inserting data into database
    $sql="INSERT INTO register(name,email,password) values('$name', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
  




?>
