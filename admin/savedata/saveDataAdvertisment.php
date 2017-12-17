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
$description = $_POST['description'];
$errorMessage = $_POST['errorMessage'];
$option11 = $_POST['option11'];
$option12 = $_POST['option12'];
$option21 = $_POST['option21'];
$option22 = $_POST['option22'];
$option23 = $_POST['option23'];
$option24 = $_POST['option24'];
$option25 = $_POST['option25'];

$sql1= "update Page
set Header='$header', Description='$description', ErrorMessage='$errorMessage'
where Name='Advertisment'";

$sql2 = "update Preferences
set Value1='$option11', Value2='$option12'
WHERE ID=4";

$sql3 = "update Preferences
set Value1='$option21', Value2='$option22', Value3='$option23', Value4='$option24', Value5='$option25'
WHERE ID=5";

if ($conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3)) {
  header("Location: ../advertisment.php");
} else {
    echo "Error: " . $sql1 . $sql2 . $sql3 . "<br>" . mysqli_error($conn);
}



  $conn->close();

   ?>
