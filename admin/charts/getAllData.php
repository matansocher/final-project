<?php
session_start();

header('Content-Type: application/json');

$servername = "li1415-114.members.linode.com";
$username = "exp";
$password = "y164p13";
$db = "exp";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->query("set names 'utf8'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM Data");
$arr=array();
while($row = $result->fetch_assoc()){
  $arr[]=$row;
}
echo json_encode($arr);

$conn->close();
  ?>
