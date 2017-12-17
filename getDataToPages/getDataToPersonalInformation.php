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

  $queryGetHeaders = $conn->query("SELECT * FROM Page WHERE Name='PersonalInformation'");

  if ($queryGetHeaders->num_rows >= 0) {
    while($row = $queryGetHeaders->fetch_assoc()) {
      $header=$row["Header"];
      $description=$row["Description"];
      $error=$row["ErrorMessage"];
      array_push($array,$header,$description,$error);
    }
  }

  $queryGetDetails6 = $conn->query("SELECT * FROM PersonalInformation WHERE Name='birthyear'");

  if ($queryGetDetails6->num_rows >= 0) {
    while($row = $queryGetDetails6->fetch_assoc()) {
      $header=$row["Header"];
      array_push($array,$header);
    }
  }

  $queryGetDetails7 = $conn->query("SELECT * FROM PersonalInformation WHERE Name='gender'");

  if ($queryGetDetails7->num_rows >= 0) {
    while($row = $queryGetDetails7->fetch_assoc()) {
      $header=$row["Header"];
      $word1=$row["value1"];
      $word2=$row["value2"];
      array_push($array,$header,$word1,$word2);
    }
  }

   $queryGetDetails1 = $conn->query("SELECT * FROM PersonalInformation WHERE Name='fieldOfEducation'");

     if ($queryGetDetails1->num_rows >= 0) {
       while($row = $queryGetDetails1->fetch_assoc()) {
         $header=$row["Header"];
         $word1=$row["value1"];
         $word2=$row["value2"];
         $word3=$row["value3"];
         $word4=$row["value4"];
         $word5=$row["value5"];
         $word6=$row["value6"];
         $word7=$row["value7"];
         $word8=$row["value8"];
         $word9=$row["value9"];
         array_push($array,$header,$word1,$word2,$word3,$word4,$word5,$word6,$word7,$word8,$word9);
        }
       }

     $queryGetDetails2 = $conn->query("SELECT * FROM PersonalInformation WHERE Name='academicSituation'");

       if ($queryGetDetails2->num_rows >= 0) {
         while($row = $queryGetDetails2->fetch_assoc()) {
           $header=$row["Header"];
           $word1=$row["value1"];
           $word2=$row["value2"];
           $word3=$row["value3"];
           $word4=$row["value4"];
           $word5=$row["value5"];
           $word6=$row["value6"];
           $word7=$row["value7"];
           array_push($array,$header,$word1,$word2,$word3,$word4,$word5,$word6,$word7);
          }
         }

     $queryGetDetails3 = $conn->query("SELECT * FROM PersonalInformation WHERE Name='studySituation'");

       if ($queryGetDetails3->num_rows >= 0) {
         while($row = $queryGetDetails3->fetch_assoc()) {
           $header=$row["Header"];
           $word1=$row["value1"];
           $word2=$row["value2"];
           $word3=$row["value3"];
           $word4=$row["value4"];
           array_push($array,$header,$word1,$word2,$word3,$word4);
          }
         }

     $queryGetDetails4 = $conn->query("SELECT * FROM PersonalInformation WHERE Name='degreeType'");

       if ($queryGetDetails4->num_rows >= 0) {
         while($row = $queryGetDetails4->fetch_assoc()) {
           $header=$row["Header"];
           $word1=$row["value1"];
           $word2=$row["value2"];
           $word3=$row["value3"];
           array_push($array,$header,$word1,$word2,$word3);
          }
         }

     $queryGetDetails5 = $conn->query("SELECT * FROM PersonalInformation WHERE Name='role'");

       if ($queryGetDetails5->num_rows >= 0) {
         while($row = $queryGetDetails5->fetch_assoc()) {
           $header=$row["Header"];
           $word1=$row["value1"];
           $word2=$row["value2"];
           array_push($array,$header,$word1,$word2);
          }
         }

         $queryGetError8 = $conn->query("SELECT * FROM PersonalInformation WHERE Name='experience'");

         if ($queryGetError8->num_rows >= 0) {
           while($row = $queryGetError8->fetch_assoc()) {
             $experience=$row["Header"];
             array_push($array,$experience);
           }
         }

     echo json_encode($array);

  $conn->close();

   ?>
