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

$numOfAlone=0;
$numOfTogether=0;

function countPreference($preference) {
  if($preference==1)
   $GLOBALS['numOfAlone']++;
  if($preference==2)
   $GLOBALS['numOfTogether']++;
}

if(isset($_POST['a'])) {
  $pre1 = $_POST['a'];
  countPreference($pre1);
}
if(isset($_POST['b'])) {
  $pre2 = $_POST['b'];
  countPreference($pre2);
}
if(isset($_POST['c'])) {
  $pre3 = $_POST['c'];
  countPreference($pre3);
}
if(isset($_POST['d'])) {
  $pre4 = $_POST['d'];
  countPreference($pre4);
}
if(isset($_POST['e'])) {
  $pre5 = $_POST['e'];
  countPreference($pre5);
}
if(isset($_POST['f'])) {
  $pre6 = $_POST['f'];
  countPreference($pre6);
}
if(isset($_POST['g'])) {
  $pre7 = $_POST['g'];
  countPreference($pre7);
}
if(isset($_POST['h'])) {
  $pre8 = $_POST['h'];
  countPreference($pre8);
}
if(isset($_POST['i'])) {
  $pre9 = $_POST['i'];
  countPreference($pre9);
}
if(isset($_POST['j'])) {
  $pre10 = $_POST['j'];
  countPreference($pre10);
}
if(isset($_POST['k'])) {
  $pre11 = $_POST['k'];
  countPreference($pre11);
}

// $pre1 = $_POST['a'];
// countPreference($pre1);
// $pre2 = $_POST['b'];
// countPreference($pre2);
// $pre3 = $_POST['c'];
// countPreference($pre3);
// $pre4 = $_POST['d'];
// countPreference($pre4);
// $pre5 = $_POST['e'];
// countPreference($pre5);
// $pre6 = $_POST['f'];
// countPreference($pre6);
// $pre7 = $_POST['g'];
// countPreference($pre7);
// $pre8 = $_POST['h'];
// countPreference($pre8);
// $pre9 = $_POST['i'];
// countPreference($pre9);
// $pre10 = $_POST['j'];
// countPreference($pre10);
// $pre11 = $_POST['k'];
// countPreference($pre11);

date_default_timezone_set("Israel");
$endTime=date("H:i:s");

$sql = "update Data
set NumOfPersonalChoises=$numOfAlone, NumOfTeamChoises=$numOfTogether, EndTime='$endTime', Finished=1
where UserID = $UserID";

if ($conn->query($sql)){
header("Location: advertismentChoose.html"); // to move to the last page
}

$conn->close();

 ?>
