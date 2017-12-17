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

$headerText = $_POST['header'];
$description = $_POST['description'];
$errorMessage = $_POST['errorMessage'];
$birthYearHeader = $_POST['birthYearHeader'];
$genderHeader = $_POST['genderHeader'];
$gender1 = $_POST['gender1'];
$gender2 = $_POST['gender2'];
$fieldOfEducationHeader = $_POST['fieldOfEducationHeader'];
$fieldOfEducation1 = $_POST['fieldOfEducation1'];
$fieldOfEducation2 = $_POST['fieldOfEducation2'];
$fieldOfEducation3 = $_POST['fieldOfEducation3'];
$fieldOfEducation4 = $_POST['fieldOfEducation4'];
$fieldOfEducation5 = $_POST['fieldOfEducation5'];
$fieldOfEducation6 = $_POST['fieldOfEducation6'];
$fieldOfEducation7 = $_POST['fieldOfEducation7'];
$fieldOfEducation8 = $_POST['fieldOfEducation8'];
$fieldOfEducation9 = $_POST['fieldOfEducation9'];
$academicSituationHeader = $_POST['academicSituationHeader'];
$academicSituation1 = $_POST['academicSituation1'];
$academicSituation2 = $_POST['academicSituation2'];
$academicSituation3 = $_POST['academicSituation3'];
$academicSituation4 = $_POST['academicSituation4'];
$academicSituation5 = $_POST['academicSituation5'];
$academicSituation6 = $_POST['academicSituation6'];
$academicSituation7 = $_POST['academicSituation7'];
$studySituationHeader = $_POST['studySituationHeader'];
$studySituation1 = $_POST['studySituation1'];
$studySituation2 = $_POST['studySituation2'];
$studySituation3 = $_POST['studySituation3'];
$studySituation4 = $_POST['studySituation4'];
$degreeTypeHeader = $_POST['degreeTypeHeader'];
$degreeType1 = $_POST['degreeType1'];
$degreeType2 = $_POST['degreeType2'];
$degreeType3 = $_POST['degreeType3'];
$roleHeader = $_POST['roleHeader'];
$role1 = $_POST['role1'];
$role2 = $_POST['role2'];
$experienceHeader = $_POST['experienceHeader'];

$sql = "update Page
set Header='$headerText', Description='$description', ErrorMessage='$errorMessage'
where Name='PersonalInformation'";

$sql0 = "update PersonalInformation
set Header='$birthYearHeader'
WHERE Name='birthyear'";

$sql00 = "update PersonalInformation
set Header='$birthYearHeader', value1='$gender1', value2='$gender2'
WHERE Name='gender'";

$sql1 = "update PersonalInformation
set Header='$fieldOfEducationHeader', value1='$fieldOfEducation1', value2='$fieldOfEducation2',
value3='$fieldOfEducation3', value4='$fieldOfEducation4',
value5='$fieldOfEducation5', value6='$fieldOfEducation6',
value7='$fieldOfEducation7',value8='$fieldOfEducation8',
value9='$fieldOfEducation9'
WHERE Name='fieldOfEducation'";

$sql2 = "update PersonalInformation
set Header='$academicSituationHeader', value1='$academicSituation1', value2='$academicSituation2',
value3='$academicSituation3', value4='$academicSituation4', value5='$academicSituation5',
value6='$academicSituation6', value7='$academicSituation7'
WHERE Name='academicSituation'";

$sql3 = "update PersonalInformation
set Header='$studySituationHeader', value1='$studySituation1', value2='$studySituation2',
value3='$studySituation3', value4='$studySituation4'
WHERE Name='studySituation'";

$sql4 = "update PersonalInformation
set Header='$degreeTypeHeader', value1='$degreeType1', value2='$degreeType2', value3='$degreeType3'
WHERE Name='degreeType'";

$sql5 = "update PersonalInformation
set Header='$roleHeader', value1='$role1', value2='$role2'
WHERE Name='role'";

$sql6 = "update PersonalInformation
set Header='$experienceHeader'
WHERE Name='experience'";


if ($conn->query($sql) && $conn->query($sql0) && $conn->query($sql00) && $conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3) && $conn->query($sql4)
 && $conn->query($sql5) && $conn->query($sql6)) {
  header("Location: ../personalInfromation.php");
} else {
    echo "Error: " . $sql1 . $sql2 . "<br>" . mysqli_error($conn);
}



  $conn->close();

   ?>
