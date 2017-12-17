<?php
session_start();

if(isset($_SESSION['userID'])) {
  $UserID = $_SESSION['userID'];
}

$rank = "null";

if(isset($_POST['choise']))
  $rank = $_POST['choise'];


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
echo "Connected successfully";

        $sql = "update Data
        set PreferenceRank=$rank
        where UserID = $UserID";

echo $sql;
//execute query
    if ($conn->query($sql)) {
      header("Location: ../thankyou.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

$conn->close();

 ?>
