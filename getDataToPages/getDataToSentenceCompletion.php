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

 $queryGetDetails = $conn->query("SELECT * FROM Sentence");

   if ($queryGetDetails->num_rows >= 0) {
     while($row = $queryGetDetails->fetch_assoc()) {
       $word1=$row["word1"];
       $word2=$row["word2"];
       $word3=$row["word3"];
       $word4=$row["word4"];
       $word5=$row["word5"];
       //add to array the 5 words
       array_push($array,$word1,$word2,$word3,$word4,$word5);
      }
     }

     $queryGetHeaders = $conn->query("SELECT * FROM Page Where Name='Sentence Completion'");

     if ($queryGetHeaders->num_rows >= 0) {
       while($row = $queryGetHeaders->fetch_assoc()) {
         $header=$row["Header"];
         $description=$row["Description"];
         $error=$row["ErrorMessage"];
         array_push($array,"$header",$description,$error);
       }
     }

     echo json_encode($array);

  $conn->close();

   ?>
