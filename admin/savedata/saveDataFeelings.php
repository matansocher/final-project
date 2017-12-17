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

$headerPreferences = $_POST['headerFeeling'];
$explanationPreferences = $_POST['explanationFeeling'];
$errorMessage = $_POST['errorMessage'];
$littleDescription = $_POST['littleDescription'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$option5 = $_POST['option5'];
$feeling1 = $_POST['feeling1'];
$feeling2 = $_POST['feeling2'];
$feeling3 = $_POST['feeling3'];
$feeling4 = $_POST['feeling4'];
$feeling5 = $_POST['feeling5'];
$feeling6 = $_POST['feeling6'];
$feeling7 = $_POST['feeling7'];
$feeling8 = $_POST['feeling8'];
$feeling9 = $_POST['feeling9'];
$feeling10 = $_POST['feeling10'];
$feeling11 = $_POST['feeling11'];

$sql1= "update Page
set Header='$headerPreferences', Description='$explanationPreferences', ErrorMessage='$errorMessage'
where Name='feelings'";

$sql2 = "update Feelings
set Value1='$feeling1', Value2='$feeling2', Value3='$feeling3', Value4='$feeling4', Value5='$feeling5', Value6='$feeling6',
Value7='$feeling7', Value8='$feeling8', Value9='$feeling9', Value10='$feeling10', Value11='$feeling11'
WHERE ID=1";

$sql3 = "update Feelings
set Value1='$littleDescription', Value2='$option1', Value3='$option2', Value4='$option3', Value5='$option4',
Value6='$option5'
WHERE ID=2";

if ($conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3)) {
  header("Location: ../feelings.php");
} else {
    echo "Error: " . $sql1 . $sql2 . $sql3 . "<br>" . mysqli_error($conn);
}



  $conn->close();

   ?>
