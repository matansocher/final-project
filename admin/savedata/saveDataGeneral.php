<?php

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

$exp1counter = $_POST['exp1counter'];
// $exp2counter = $_POST['exp2counter'];
// $exp3counter = $_POST['exp3counter'];
// $exp4counter = $_POST['exp4counter'];
// $exp5counter = $_POST['exp5counter'];
// $exp6counter = $_POST['exp6counter'];

if ((isset($_POST['activeexp1'])) && ($_POST['activeexp1'] == "on"))
    $activeexp1 = 1;
else
    $activeexp1 = 0;
if ((isset($_POST['activeexp2'])) && ($_POST['activeexp2'] == "on"))
    $activeexp2 = 1;
else
    $activeexp2 = 0;
if ((isset($_POST['activeexp3'])) && ($_POST['activeexp3'] == "on"))
    $activeexp3 = 1;
else
    $activeexp3 = 0;
if ((isset($_POST['activeexp4'])) && ($_POST['activeexp4'] == "on"))
    $activeexp4 = 1;
else
    $activeexp4 = 0;
if ((isset($_POST['activeexp5'])) && ($_POST['activeexp5'] == "on"))
    $activeexp5 = 1;
else
    $activeexp5 = 0;
if ((isset($_POST['activeexp6'])) && ($_POST['activeexp6'] == "on"))
    $activeexp6 = 1;
else
    $activeexp6 = 0;


if ((isset($_POST['order1'])))
  $order1 = $_POST['order1'];
else
  $order1 = 0;
if ((isset($_POST['order2'])))
  $order2 = $_POST['order2'];
else
  $order2 = 0;
if ((isset($_POST['order3'])))
  $order3 = $_POST['order3'];
else
  $order3 = 0;
if ((isset($_POST['order4'])))
  $order4 = $_POST['order4'];
else
  $order4 = 0;
if ((isset($_POST['order5'])))
  $order5 = $_POST['order5'];
else
  $order5 = 0;
if ((isset($_POST['order6'])))
  $order6 = $_POST['order6'];
else
  $order6 = 0;

$sql1= "update Experiments
set Counter=$exp1counter, isActive=$activeexp1, OrderOfExps=$order1
where Number=1";
$sql2= "update Experiments
set Counter=$exp1counter, isActive=$activeexp2, OrderOfExps=$order2
where Number=2";
$sql3= "update Experiments
set Counter=$exp1counter, isActive=$activeexp3, OrderOfExps=$order3
where Number=3";
$sql4= "update Experiments
set Counter=$exp1counter, isActive=$activeexp4, OrderOfExps=$order4
where Number=4";
$sql5= "update Experiments
set Counter=$exp1counter, isActive=$activeexp5, OrderOfExps=$order5
where Number=5";
$sql6= "update Experiments
set Counter=$exp1counter, isActive=$activeexp6, OrderOfExps=$order6
where Number=6";

if ($conn->query($sql1) && $conn->query($sql2)  && $conn->query($sql3) && $conn->query($sql4) && $conn->query($sql5)  &&
$conn->query($sql6)) {
  header("Location: ../general.php");
} else {
    echo "Error: " . $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . "<br>" . mysqli_error($conn);
}



  $conn->close();

   ?>
