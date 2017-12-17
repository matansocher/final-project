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

$feel1 = "null";
$feel2 = "null";
$feel3 = "null";
$feel4 = "null";
$feel5 = "null";
$feel6 = "null";
$feel7 = "null";
$feel8 = "null";
$feel9 = "null";
$feel10 = "null";
$feel11 = "null";

if(isset($_POST['a'])) {
  $feel1 = $_POST['a'];
}
if(isset($_POST['b'])) {
  $feel2 = $_POST['b'];
}
if(isset($_POST['c'])) {
  $feel3 = $_POST['c'];
}
if(isset($_POST['d'])) {
  $feel4 = $_POST['d'];
}
if(isset($_POST['e'])) {
  $feel5 = $_POST['e'];
}
if(isset($_POST['f'])) {
  $feel6 = $_POST['f'];
}
if(isset($_POST['g'])) {
  $feel7 = $_POST['g'];
}
if(isset($_POST['h'])) {
  $feel8 = $_POST['h'];
}
if(isset($_POST['i'])) {
  $feel9 = $_POST['i'];
}
if(isset($_POST['j'])) {
  $feel10 = $_POST['j'];
}
if(isset($_POST['k'])) {
  $feel11 = $_POST['k'];
}

$sql = "update Data
set Feeling1=$feel1, Feeling2=$feel2, Feeling3=$feel3, Feeling4=$feel4, Feeling5=$feel5, Feeling6=$feel6,
Feeling7=$feel7, Feeling8=$feel8, Feeling9=$feel9, Feeling10=$feel10, Feeling11=$feel11
where UserID = $UserID";

if ($conn->query($sql)){
  header("Location: paymentAndDonation.html"); // to move to the last page
}

$conn->close();

 ?>
