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

      $queryGetHeaders = $conn->query("SELECT * FROM Page WHERE Name='helpTask'");

      if ($queryGetHeaders->num_rows >= 0) {
        while($row = $queryGetHeaders->fetch_assoc()) {
          $header=$row["Header"];
          $description=$row["Description"];
          $error=$row["ErrorMessage"];
          array_push($array,$header,$description,$error);
        }
      }

      // $queryGetDetails = $conn->query("SELECT * FROM Texts WHERE Num=1");
      //
      //     if ($queryGetDetails->num_rows >= 0) {
      //       while($row = $queryGetDetails->fetch_assoc()) {
      //         $text1=$row["text1"];
      //         $text2=$row["text2"];
      //         array_push($array,$text1,$text2);
      //        }
      //       }

      echo json_encode($array);

  $conn->close();

   ?>
