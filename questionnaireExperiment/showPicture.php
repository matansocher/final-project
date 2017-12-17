<?php
  session_start();

  if(isset($_SESSION['userID'])) {
    $UserID = $_SESSION['userID'];
  }

  $servername = "li1415-114.members.linode.com";
  $username = "exp";
  $password = "y164p13";
  $db = "exp";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

$result = $conn->query("SELECT GroupType FROM Data WHERE UserID=$UserID");

$row=mysqli_fetch_assoc($result);

echo $row["GroupType"];


$conn->close();


   ?>
