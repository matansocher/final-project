<?php

header("Content-Type: text/html; charset=utf-8");

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

     $queryGetHeaders = $conn->query("SELECT * FROM Page Where Name='Picture'");

     if ($queryGetHeaders->num_rows >= 0) {
       while($row = $queryGetHeaders->fetch_assoc()) {
         $header=$row["Header"];
         $description=$row["Description"];
         array_push($array,$header,$description);
       }
     }

      $queryGetPic1 = $conn->query("SELECT Picture FROM Pictures Where PageName='picture1'");
      if ($queryGetPic1->num_rows >= 0) {
        while($row = $queryGetPic1->fetch_assoc()) {
          if($row["Picture"]!= NULL){
          $pic1= '<img height=450px src="data:image/jpeg;base64,'.base64_encode( $row["Picture"] ).'"/>';
          array_push($array,$pic1);
        }
        }
      }
     echo json_encode($array);

  $conn->close();

   ?>
