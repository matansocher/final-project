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

 $queryGetDetails1 = $conn->query("SELECT * FROM Panas WHERE ID=1");

   if ($queryGetDetails1->num_rows >= 0) {
     while($row = $queryGetDetails1->fetch_assoc()) {
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
       $word12=$row["Value12"];
       $word13=$row["Value13"];
       $word14=$row["Value14"];
       $word15=$row["Value15"];
       $word16=$row["Value16"];
       $word17=$row["Value17"];
       $word18=$row["Value18"];
       $word19=$row["Value19"];
       $word20=$row["Value20"];
       array_push($array,$word1,$word2,$word3,$word4,$word5,$word6,$word7,$word8,$word9,$word10,$word11,$word12,$word13,$word14,$word15,$word16,$word17,$word18,$word19,$word20);
      }
     }

     $queryGetHeaders = $conn->query("SELECT * FROM Page WHERE Name='Panas'");

     if ($queryGetHeaders->num_rows >= 0) {
       while($row = $queryGetHeaders->fetch_assoc()) {
         $header=$row["Header"];
         $description=$row["Description"];
         $error=$row["ErrorMessage"];
         array_push($array,"$header",$description,$error);
       }
     }

     $queryGetDetails2 = $conn->query("SELECT * FROM Panas WHERE ID=2");

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
