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

$headerPreferences = $_POST['headerPreferences'];
$explanationPreferences = $_POST['explanationPreferences'];
$errorMessage = $_POST['errorMessage'];
$littleDescription = $_POST['littleDescription'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$option5 = $_POST['option5'];
$preference1 = $_POST['preference1'];
$preference2 = $_POST['preference2'];
$preference3 = $_POST['preference3'];
$preference4 = $_POST['preference4'];
$preference5 = $_POST['preference5'];
$preference6 = $_POST['preference6'];
$preference7 = $_POST['preference7'];
$preference8 = $_POST['preference8'];
$preference9 = $_POST['preference9'];
$preference10 = $_POST['preference10'];
$preference11 = $_POST['preference11'];

$sql1= "update Page
set Header='$headerPreferences', Description='$explanationPreferences', ErrorMessage='$errorMessage'
where Name='Preferences2'";

$sql2 = "update Preferences
set Value1='$preference1', Value2='$preference2', Value3='$preference3', Value4='$preference4', Value5='$preference5', Value6='$preference6',
Value7='$preference7', Value8='$preference8', Value9='$preference9', Value10='$preference10', Value11='$preference11'
where ID=1";

$sql3 = "update Preferences
set Value1='$littleDescription', Value2='$option1', Value3='$option2', Value4='$option3', Value5='$option4',
Value6='$option5'
where ID=3";

if ($conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3)) {
  header("Location: ../preferences2.php");
} else {
    echo "Error: " . $sql1 . $sql2 . $sql3 . "<br>" . mysqli_error($conn);
}



  $conn->close();

   ?>
