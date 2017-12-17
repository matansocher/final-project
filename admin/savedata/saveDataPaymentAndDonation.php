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
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];

$sql1= "update Page
set Header='$header', Description='$description', ErrorMessage='$errorMessage'
where Name='Donation'";

$sql2 = "update Preferences
set Value1='$option1', Value2='$option2'
WHERE ID=6";

if ($conn->query($sql1) && $conn->query($sql2)) {
  header("Location: ../paymentAndDonation.php");
} else {
    echo "Error: " . $sql1 . $sql2 . "<br>" . mysqli_error($conn);
}



  $conn->close();

   ?>
