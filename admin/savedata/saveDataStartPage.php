<?php
header('Content-Type: text/html; charset=utf-8');
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

$headerText = $_POST['header'];
$explanationText = $_POST['content'];

$sql = "update Page
set Header='$headerText', Description='$explanationText'
where Name='Start Page'";

if ($conn->query($sql)) {
  header("Location: ../startpage.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

  $conn->close();

   ?>
