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

 $queryGetDetails = $conn->query("SELECT * FROM Preferences WHERE ID=1");

   if ($queryGetDetails->num_rows >= 0) {
     while($row = $queryGetDetails->fetch_assoc()) {
       $word1=$row["Value1"];
       $word2=$row["Value2"];
       $word3=$row["Value3"];
       $word4=$row["Value4"];
       $word5=$row["Value5"];
       $word6=$row["Value6"];
       $word7=$row["Value7"];
       $word8=$row["Value8"];
       $word9=$row["Value9"];
       $word10=$row["Value10"];
       $word11=$row["Value11"];
       array_push($array,$word1,$word2,$word3,$word4,$word5,$word6,$word7,$word8,$word9,$word10,$word11);
      }
     }

     $queryGetHeaders = $conn->query("SELECT * FROM Page WHERE Name='Preferences2'");

     if ($queryGetHeaders->num_rows >= 0) {
       while($row = $queryGetHeaders->fetch_assoc()) {
         $header=$row["Header"];
         $description=$row["Description"];
         $error=$row["ErrorMessage"];
         array_push($array,$header,$description,$error);
       }
     }

     $queryGetDetails2 = $conn->query("SELECT * FROM Preferences WHERE ID=3");

       if ($queryGetDetails2->num_rows >= 0) {
         while($row = $queryGetDetails2->fetch_assoc()) {
           $word1=$row["Value1"];
           $word2=$row["Value2"];
           $word3=$row["Value3"];
           $word4=$row["Value4"];
           $word5=$row["Value5"];
           $word6=$row["Value6"];
           array_push($array,$word1,$word2,$word3,$word4,$word5,$word6);
          }
        }

     echo json_encode($array);

  $conn->close();

   ?>
