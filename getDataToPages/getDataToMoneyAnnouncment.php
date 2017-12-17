<?php

header("Content-Type: text/html; charset=utf-8");

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

    $queryGetComments = $conn->query("SELECT * FROM Page Where Name='moneyAnnouncment'");

     if ($queryGetComments->num_rows >= 0) {
       while($row = $queryGetComments->fetch_assoc()) {
         $header=$row["Header"];
         $description=$row["Description"];
         array_push($array,$header,$description);
       }
     }
     echo json_encode($array);

  $conn->close();

   ?>
