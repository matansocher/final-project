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

 $queryGetDetails = $conn->query("SELECT * FROM Texts WHERE Name='textAndChoose'");

   if ($queryGetDetails->num_rows >= 0) {
     while($row = $queryGetDetails->fetch_assoc()) {
       $text1=$row["text1"];
       $text2=$row["text2"];
       array_push($array,$text1,$text2);
      }
     }

     $queryGetHeaders = $conn->query("SELECT * FROM Page WHERE Name='textAndChoose1'");

     if ($queryGetHeaders->num_rows >= 0) {
       while($row = $queryGetHeaders->fetch_assoc()) {
         $header=$row["Header"];
         $description=$row["Description"];
         array_push($array,$header,$description);
       }
     }
     echo json_encode($array);

  $conn->close();

   ?>
