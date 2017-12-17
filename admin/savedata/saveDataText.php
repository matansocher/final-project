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

$headerPreferences = $_POST['headerText'];
$explanationPreferences = $_POST['explanationText'];
$text1 = $_POST['text1'];
$text2 = $_POST['text2'];

$sql1= "update Page
set Header='$headerPreferences', Description='$explanationPreferences'
where Name='Text'";

$sql2 = "update Texts
set text1='$text1', text2='$text2'";

if ($conn->query($sql1) && $conn->query($sql2)) {
  header("Location: ../text.php");
} else {
    echo "Error: " . $sql1 . $sql2 . "<br>" . mysqli_error($conn);
}



  $conn->close();

   ?>
