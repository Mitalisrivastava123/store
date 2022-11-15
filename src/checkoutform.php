<?php
session_start();
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql4 =  "SELECT *  FROM cart";
$result = mysqli_query($conn, $sql4);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $orderid = $row["id"];

    $userid = $row["userid"];
  }
}
$orderid;
 $userid;
$name = $_POST["name"];
$email = $_POST["email"];
$address = $_POST["address"];
$personid = $_SESSION["personid"];

if($name == "" || $email == "" || $address == "")
{
    echo "<script>
    window.location.href='cartcheckout.php';
   </script>"; 
}
else
{ 
$sql="INSERT INTO checkout(name,email,deliveryaddress,orderid,userid) values('$name', '$email', '$address','$orderid','$userid')";
$result = mysqli_query($conn, $sql);
echo "<script>alert('your order has been confirmed');
window.location.href='cartcheckout.php';
</script>"; 
if (mysqli_query($conn, $sql)) {

} 
}





?>