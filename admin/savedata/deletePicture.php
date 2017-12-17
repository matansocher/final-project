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

$picNum = $_GET['picNum'];

if($picNum==1){
$sql1 = "update Pictures
set Picture=NULL
where PageName='picture1'";
    if ($conn->query($sql1)) {
      header("Location: ../pictures.php");
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
}

if($picNum==2){
$sql2 = "update Pictures
set Picture=NULL
where PageName='picture2'";
    if ($conn->query($sql2)) {
      header("Location: ../pictures.php");
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
}
if($picNum==3){
$sql3 = "update Pictures
set Picture=NULL
where PageName='picture3'";
    if ($conn->query($sql3)) {
      header("Location: ../pictures.php");
    } else {
        echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
    }
}
if($picNum==4){
$sql3 = "update Pictures
set Picture=NULL
where PageName='gamePic1'";
    if ($conn->query($sql3)) {
      header("Location: ../game.php");
    } else {
        echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
    }
}
if($picNum==5){
$sql3 = "update Pictures
set Picture=NULL
where PageName='gamePic2'";
    if ($conn->query($sql3)) {
      header("Location: ../game.php");
    } else {
        echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
    }
}
  $conn->close();

   ?>
