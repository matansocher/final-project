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

$queryGetComments = $conn->query("SELECT count(Comment) as numberComments FROM Data Where Comment !=''");

 if ($queryGetComments->num_rows >= 0) {
   while($row = $queryGetComments->fetch_assoc()) {
     $comment=$row["numberComments"];
     array_push($array,$comment);
   }
 }

 $queryGetParticipants = $conn->query("SELECT count(ID) as numberOfUsers FROM Data");

  if ($queryGetParticipants->num_rows >= 0) {
    while($row = $queryGetParticipants->fetch_assoc()) {
      $numberOfUsers=$row["numberOfUsers"];
      array_push($array,$numberOfUsers);
    }
  }


   $queryGetExpActives = $conn->query("SELECT count(Number) as numberOfEXP FROM Experiments WHERE isActive=1");

    if ($queryGetExpActives->num_rows >= 0) {
      while($row = $queryGetExpActives->fetch_assoc()) {
        $numberOfEXP=$row["numberOfEXP"];
        array_push($array,$numberOfEXP);
      }
    }

    $queryGetAvgOfUsersForDay = $conn->query("SELECT 	Date, count(ID) as numForDay FROM Data GROUP BY Date");
    $counter=0;
    $sum=0;
     if ($queryGetAvgOfUsersForDay->num_rows >= 0) {
       while($row = $queryGetAvgOfUsersForDay->fetch_assoc()) {
         $numForDay=$row["numForDay"];
         $counter=$counter+1;
         $sum=$sum+$row["numForDay"];
       }
        array_push($array,intval($sum/$counter));
     }
    echo json_encode($array);

  $conn->close();

   ?>
