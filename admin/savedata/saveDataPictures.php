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

$headerText = $_POST['headerPicture'];


$sql = "update Page
set Header='$headerText'
where Name='Picture'";

  if(!empty($_FILES["uploadPic1"]["tmp_name"])) {
    
      $imageDate1 = mysqli_real_escape_string($conn,file_get_contents($_FILES["uploadPic1"]["tmp_name"]));
      $sql1 = $conn->query("update Pictures
      SET Picture='$imageDate1'
      where PageName='picture1'");
  }
  if(!empty($_FILES["uploadPic2"]["tmp_name"])) {
      $imageDate2 = mysqli_real_escape_string($conn,file_get_contents($_FILES["uploadPic2"]["tmp_name"]));
      $sql2 = $conn->query("update Pictures
      SET Picture='$imageDate2'
      where PageName='picture2'");
  }
  if(!empty($_FILES["uploadPic3"]["tmp_name"])) {
      $imageDate3 = mysqli_real_escape_string($conn,file_get_contents($_FILES["uploadPic3"]["tmp_name"]));
      $sql3 = $conn->query("update Pictures
      SET Picture='$imageDate3'
      where PageName='picture3'");
  }
if ($conn->query($sql)) {
  header("Location: ../pictures.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


  $conn->close();

   ?>
