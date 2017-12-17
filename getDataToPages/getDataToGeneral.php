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

    $queryGetDataToExperiments = $conn->query("SELECT * FROM Experiments");

    if ($queryGetDataToExperiments->num_rows >= 0) {
      while($row = $queryGetDataToExperiments->fetch_assoc()) {
        $activeexp=$row["isActive"];
        $counter=$row["Counter"];
        $order=$row["OrderOfExps"];
        array_push($array,$activeexp,$counter,$order);
      }
    }
    echo json_encode($array);

  $conn->close();

   ?>
