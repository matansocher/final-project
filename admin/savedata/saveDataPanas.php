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

$headerText = $_POST['panasHeader'];
$explanationText = $_POST['panasExplanation'];
$errorMessage = $_POST['errorMessage'];
$littleDescription = $_POST['littleDescription'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$option5 = $_POST['option5'];
$panas1 = $_POST['panas1'];
$panas2 = $_POST['panas2'];
$panas3 = $_POST['panas3'];
$panas4 = $_POST['panas4'];
$panas5 = $_POST['panas5'];
$panas6 = $_POST['panas6'];
$panas7 = $_POST['panas7'];
$panas8 = $_POST['panas8'];
$panas9 = $_POST['panas9'];
$panas10 = $_POST['panas10'];
$panas11 = $_POST['panas11'];
$panas12 = $_POST['panas12'];
$panas13 = $_POST['panas13'];
$panas14 = $_POST['panas14'];
$panas15 = $_POST['panas15'];
$panas16 = $_POST['panas16'];
$panas17 = $_POST['panas17'];
$panas18 = $_POST['panas18'];
$panas19 = $_POST['panas19'];
$panas20 = $_POST['panas20'];

$sql1 = "update Page
set Header='$headerText', Description='$explanationText', ErrorMessage='$errorMessage'
where Name='Panas'";

$sql2 = "update Panas
set Value1='$littleDescription', Value2='$option1', Value3='$option2', Value4='$option3', Value5='$option4', Value6='$option5'
WHERE ID=2";

$sql3 = "update Panas
set Value1='$panas1', Value2='$panas2', Value3='$panas3', Value4='$panas4', Value5='$panas5', Value6='$panas6', Value7='$panas7',
Value8='$panas8',Value9='$panas9', Value10='$panas10', Value11='$panas11', Value12='$panas12', Value13='$panas13', Value14='$panas14',
Value15='$panas15', Value16='$panas16',Value17='$panas17', Value18='$panas18', Value19='$panas19', Value20='$panas20'
WHERE ID=1";

if ($conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3)) {
  header("Location: ../panas.php");
} else {
    echo "Error: " . $sql1 . $sql2 . $sql3 . "<br>" . mysqli_error($conn);
}



  $conn->close();

   ?>
