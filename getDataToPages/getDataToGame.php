<?php
  session_start();

  if(isset($_SESSION['userID'])) {
    $UserID = $_SESSION['userID'];
  }

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

  $array=array();

 $queryGetDetails = $conn->query("SELECT * FROM Page WHERE Name='Game'");

   if ($queryGetDetails->num_rows >= 0) {
     while($row = $queryGetDetails->fetch_assoc()) {
       $header=$row["Header"];
       $description=$row["Description"];
       $error=$row["ErrorMessage"];
       array_push($array,$header,$description,$error);
      }
     }
     $queryGetGamePic1ForAdminSystem = $conn->query("SELECT Picture FROM Pictures Where PageName='gamePic1'");
     if ($queryGetGamePic1ForAdminSystem->num_rows >= 0) {
       while($row = $queryGetGamePic1ForAdminSystem->fetch_assoc()) {
         $picGame1Show= '<img id=picGame1 height=80px src="data:image/jpeg;base64,'.base64_encode( $row["Picture"] ).'"/>';
         array_push($array,$picGame1Show);
       }
     }
     $queryGetGamePic2ForAdminSystem = $conn->query("SELECT Picture FROM Pictures Where PageName='gamePic2'");
     if ($queryGetGamePic2ForAdminSystem->num_rows >= 0) {
       while($row = $queryGetGamePic2ForAdminSystem->fetch_assoc()) {
         $picGame2Show= '<img id=picGame2 height=80px src="data:image/jpeg;base64,'.base64_encode( $row["Picture"] ).'"/>';
         array_push($array,$picGame2Show);
       }
     }
     echo json_encode($array);

  $conn->close();

   ?>
