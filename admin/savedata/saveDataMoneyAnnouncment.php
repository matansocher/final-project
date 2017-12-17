<?php

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

$header = $_POST['header'];
$explanation = $_POST['description'];

$sql1= "update Page
set Header='$header', Description='$explanation'
where Name='moneyAnnouncment'";

if ($conn->query($sql1)) {
  header("Location: ../moneyAnnouncment.php");
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

  $conn->close();

   ?>
