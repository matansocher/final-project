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
echo "Connected successfully";

$pre1 = "null";
$pre2 = "null";
$pre3 = "null";
$pre4 = "null";
$pre5 = "null";
$pre6 = "null";
$pre7 = "null";
$pre8 = "null";
$pre9 = "null";
$pre10 = "null";
$pre11 = "null";

if(isset($_POST['a'])) {
  $pre1 = $_POST['a'];
}
if(isset($_POST['b'])) {
  $pre2 = $_POST['b'];
}
if(isset($_POST['c'])) {
  $pre3 = $_POST['c'];
}
if(isset($_POST['d'])) {
  $pre4 = $_POST['d'];
}
if(isset($_POST['e'])) {
  $pre5 = $_POST['e'];
}
if(isset($_POST['f'])) {
  $pre6 = $_POST['f'];
}
if(isset($_POST['g'])) {
  $pre7 = $_POST['g'];
}
if(isset($_POST['h'])) {
  $pre8 = $_POST['h'];
}
if(isset($_POST['i'])) {
  $pre9 = $_POST['i'];
}
if(isset($_POST['j'])) {
  $pre10 = $_POST['j'];
}
if(isset($_POST['k'])) {
  $pre11 = $_POST['k'];
}

// $pre1 = $_POST['a'];
// $pre2 = $_POST['b'];
// $pre3 = $_POST['c'];
// $pre4 = $_POST['d'];
// $pre5 = $_POST['e'];
// $pre6 = $_POST['f'];
// $pre7 = $_POST['g'];
// $pre8 = $_POST['h'];
// $pre9 = $_POST['i'];
// $pre10 = $_POST['j'];
// $pre11 = $_POST['k'];

date_default_timezone_set("Israel");
$endTime=date("H:i:s");

$sql = "update Data
set Preferences1=$pre1, Preferences2=$pre2, Preferences3=$pre3, Preferences4=$pre4, Preferences5=$pre5, Preferences6=$pre6,
Preferences7=$pre7, Preferences8=$pre8, Preferences9=$pre9, Preferences10=$pre10, Preferences11=$pre11, EndTime='$endTime', Finished=1
where UserID = $UserID";

if ($conn->query($sql)){

header("Location: advertismentRank.html"); // to move to the last page
}





$conn->close();

 ?>
