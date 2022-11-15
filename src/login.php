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
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT id,name,email,address  FROM register WHERE email = '$email' and password='$password'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $_SESSION["id1"]=$row["id"];    
$_SESSION["name"]= $row["name"];   
    }
   
}
header("Location:index.php");

?>
<!-- fetching data from register table -->