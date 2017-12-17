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

$headerText = $_POST['headerSentence'];
$explanationText = $_POST['explanationSentence'];
$money11 = $_POST['money11'];
$money12 = $_POST['money12'];
$money13 = $_POST['money13'];
$money14 = $_POST['money14'];
$money15 = $_POST['money15'];
$money21 = $_POST['money21'];
$money22 = $_POST['money22'];
$money23 = $_POST['money23'];
$money24 = $_POST['money24'];
$money25 = $_POST['money25'];
$money31 = $_POST['money31'];
$money32 = $_POST['money32'];
$money33 = $_POST['money33'];
$money34 = $_POST['money34'];
$money35 = $_POST['money35'];
$general11 = $_POST['general11'];
$general12 = $_POST['general12'];
$general13 = $_POST['general13'];
$general14 = $_POST['general14'];
$general15 = $_POST['general15'];
$general21 = $_POST['general21'];
$general22 = $_POST['general22'];
$general23 = $_POST['general23'];
$general24 = $_POST['general24'];
$general25 = $_POST['general25'];
$general31 = $_POST['general31'];
$general32 = $_POST['general32'];
$general33 = $_POST['general33'];
$general34 = $_POST['general34'];
$general35 = $_POST['general35'];

$sql= "update Page
set Header='$headerText', Description='$explanationText'
where Name='Sentence Completion'";

$sql1 = "update Sentence
set word1='$money11', word2='$money12', word3='$money13', word4='$money14', word5='$money15'
where SentenceNum=1";

$sql2 = "update Sentence
set word1='$money21', word2='$money22', word3='$money23', word4='$money24', word5='$money25'
where SentenceNum=2";

$sql3 = "update Sentence
set word1='$money31', word2='$money32', word3='$money33', word4='$money34', word5='$money35'
where SentenceNum=3";

$sql4 = "update Sentence
set word1='$general11', word2='$general12', word3='$general13', word4='$general14', word5='$general15'
where SentenceNum=4";

$sql5 = "update Sentence
set word1='$general21', word2='$general22', word3='$general23', word4='$general24', word5='$general25'
where SentenceNum=5";

$sql6 = "update Sentence
set word1='$general31', word2='$general32', word3='$general33', word4='$general34', word5='$general35'
where SentenceNum=6";

if ($conn->query($sql) && $conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3) && $conn->query($sql4) &&
$conn->query($sql5) && $conn->query($sql6)) {
  header("Location: ../sentenceCompletion.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

  $conn->close();

   ?>
