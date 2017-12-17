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

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

    $numberOfSwitches = $_POST["numOfSwitches"];
    echo "numberOfSwitches: " . $numberOfSwitches;
    $ifFound = $_POST["ifFound"];
    echo "iffound".$ifFound;
    $startTime = $_POST["start"];
    $date = new DateTime();
    $endTime = $date->getTimestamp();
    $totalTime = $endTime - $startTime;
    echo "totalTime".$totalTime;


    date_default_timezone_set("Israel");
    $endTime=date("H:i:s");
    // write it to the data base
    $sql = "update Data
    set HelpSeconds=$totalTime, EndTime='$endTime', ifFound=$ifFound, numberOfSwitches=$numberOfSwitches, Finished=1
    where UserID = $UserID";

    echo $UserID;

    // move to next page
    if ($conn->query($sql)){
      header("Location: ../thankyou.php"); // to move to the last page
    }
    $conn->close();
   ?>
