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

$headerText = $_POST['headerGame'];
$explanationText = $_POST['explanationGame'];

$sql = "update Page
set Header='$headerText', Description='$explanationText'
where Name='Game'";

if(!empty($_FILES["uploadPic4"]["tmp_name"])) {

    $imageDate1 = mysqli_real_escape_string($conn,file_get_contents($_FILES["uploadPic4"]["tmp_name"]));
    $sql1 = $conn->query("update Pictures
    SET Picture='$imageDate1'
    where PageName='gamePic1'");
}
if(!empty($_FILES["uploadPic5"]["tmp_name"])) {

    $imageDate2 = mysqli_real_escape_string($conn,file_get_contents($_FILES["uploadPic5"]["tmp_name"]));
    $sql2 = $conn->query("update Pictures
    SET Picture='$imageDate2'
    where PageName='gamePic2'");
}
if ($conn->query($sql)) {
  header("Location: ../Game.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



  $conn->close();

   ?>
