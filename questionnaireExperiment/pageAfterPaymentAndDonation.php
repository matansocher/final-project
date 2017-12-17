<?php
session_start();

if(isset($_SESSION['userID'])) {
  $UserID = $_SESSION['userID'];
}

$howMuchToDonate = "null";
$whoToDonate = "null";
$howMuchToGet = "null";
$paypalMail = "null";
$cellarixPhone = "null";
$bitPhone = "null";
$checkName = "null";
$checkAddress = "null";

if(isset($_POST['howMuchToDonate'])) {
  $howMuchToDonate = $_POST['howMuchToDonate'];
  $howMuchToGet = 100-$howMuchToDonate;
}
if(isset($_POST['whoToDonate']))
  $whoToDonate = $_POST['whoToDonate'];
if(isset($_POST['paypalMail']))
  $paypalMail = $_POST['paypalMail'];
if(isset($_POST['cellarixPhone']))
  $cellarixPhone = $_POST['cellarixPhone'];
if(isset($_POST['bitPhone']))
  $bitPhone = $_POST['bitPhone'];
if(isset($_POST['checkName']))
  $checkName = $_POST['checkName'];
if(isset($_POST['checkAddress']))
  $checkAddress = $_POST['checkAddress'];

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

date_default_timezone_set("Israel");
$endTime=date("H:i:s");

$sql = "update Data
set DonationAmount=$howMuchToDonate, DonationAssociationName='$whoToDonate', AmountToRecieve=$howMuchToGet,
PaypalMail='$paypalMail', CellarixPhone='$cellarixPhone', BitPhone='$bitPhone', CheckName='$checkName',
CheckAddress='$checkAddress', EndTime='$endTime', Finished=1
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
