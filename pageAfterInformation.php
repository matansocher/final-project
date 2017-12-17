<?php
session_start();

// if(isset($_SESSION['userID'])) {
//   session_unset($_SESSION['userID']);
//   session_destroy();
// }

$date = new DateTime();
date_default_timezone_set("Israel");
$UserID = $date->getTimestamp();
$_SESSION['userID'] = $UserID;

// set current user in session

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

$shnatleida = $_POST['birthyear'];
$gender = $_POST['gender'];
$fieldOfEducation = $_POST['fieldOfEducation'];
$academicSituation = $_POST['academicSituation'];

$startTime=date('H:i:s');

if($academicSituation==2 || $academicSituation==4 || $academicSituation==6 || $academicSituation==7){ // if it is NOT a student
  $role = $_POST['role'];
  $experience = $_POST['experience'];
  $studySituation = 0;
  if($academicSituation==4 || $academicSituation==6 || $academicSituation==7){
      $degreeType = $_POST['degreeType'];
  }
}
 if($academicSituation==1 || $academicSituation==3){ // if it is a student
  $studySituation = $_POST['studySituation'];
  $role = 0;
  $experience = 0;
  $degreeType=0;
}
if($academicSituation==5){ // if shnat hashlama student
 $studySituation = 0;
 $role = 0;
 $experience = 0;
 $degreeType=0;
}


if (($fieldOfEducation == 5 || $fieldOfEducation == 6 ||
$fieldOfEducation == 7 || $fieldOfEducation == 8 || $fieldOfEducation == 9)
    && ($academicSituation == 3) && ($studySituation == 1)) {
  $ResearchGroup = 100;
}
else if (($fieldOfEducation == 1 || $fieldOfEducation == 2 || $fieldOfEducation == 3) &&
($academicSituation == 1 || $academicSituation == 3) && ($studySituation == 1)) {
  $ResearchGroup = 101;
}
else if ((($fieldOfEducation == 1 || $fieldOfEducation == 2 || $fieldOfEducation == 3)
    && ($academicSituation == 1 || $academicSituation == 3) && ($studySituation == 2 ||
    $studySituation == 3 || $studySituation == 4))
    ||(($fieldOfEducation == 1 || $fieldOfEducation == 2 || $fieldOfEducation == 3) && $academicSituation == 5)) {
  $ResearchGroup = 102;
  }
else if ((($fieldOfEducation == 1 || $fieldOfEducation == 2 || $fieldOfEducation == 3)
    && (($academicSituation == 2 || $academicSituation == 4 || $academicSituation == 6 ||
    $academicSituation == 7) && ($role == 1)))) {
  $ResearchGroup = 103;
}
else if (($fieldOfEducation == 1 || $fieldOfEducation == 2 || $fieldOfEducation == 3)
    &&(($academicSituation == 2 || $academicSituation == 4 || $academicSituation == 6 ||
    $academicSituation == 7) && ($role == 2))) {
  $ResearchGroup = 104;
}
else {
  $ResearchGroup = 999;
}


echo " ResearchGroup".$ResearchGroup. "<br>";

$counterQuery = $conn->query("SELECT Counter FROM Experiments WHERE Number = 1");
if ($counterQuery->num_rows > 0) {
 while($row = $counterQuery->fetch_assoc()) {
   $counter = $row["Counter"];
 }
}

$arrayOfOrderedExps = array();

$queryOrderedActiveExps = $conn->query("SELECT Number FROM Experiments
  WHERE OrderOfExps != 0 ORDER BY OrderOfExps"); // array of experiments ordered where order != 0 (query)
if ($queryOrderedActiveExps->num_rows > 0) {
 while($row = $queryOrderedActiveExps->fetch_assoc()) {
   array_push($arrayOfOrderedExps,$row["Number"]);
 }
}

echo "********************";
echo " Counter: " . $counter;
$i = 0;

$groupNum = 0;

for ($i = 0; $i < sizeof($arrayOfOrderedExps); $i++) {
  $howManyPeople=0;
  echo " size:".sizeof($arrayOfOrderedExps)."<br>";
  $expNum=$arrayOfOrderedExps[$i];  //get experiment number from array
  echo " expNum: ".$expNum."<br>";
  $queryOrderedActiveExps = $conn->query(
    "SELECT ResearchGroup,COUNT(ID) AS howMany
    FROM Data
    WHERE ResearchGroup = $ResearchGroup AND ExperimentNumber = $expNum AND Finished = 1
    GROUP BY ResearchGroup");
    // count how many people has done the current exp in their research group and has finished the exp

  if ($queryOrderedActiveExps->num_rows > 0) {
   while($row = $queryOrderedActiveExps->fetch_assoc()) {
     $howManyPeople = $row["howMany"];
   }
 }
 $howManyToAdd = 0;
 // if the exp has 2 groups than the counter should be 30, if 3 groups than 60
 if ($expNum == 1 || $expNum == 4 || $expNum == 5 || $expNum == 6)
  $howManyToAdd = $counter;
if ($expNum == 2 || $expNum == 3)
 $howManyToAdd = $counter*2;

 echo " howManyToAdd: ".$howManyToAdd;
 echo " ------howManyPeople: ".$howManyPeople;

 if ($howManyPeople < $counter + $howManyToAdd) {
    $groupNum = getGroupNum($arrayOfOrderedExps[$i],$ResearchGroup,$conn);
    break;
  }
}


function getGroupNum($expNum,$ResearchGroup,$conn) {
  $LastGroupNum=0;
  $HighestID = 0;
    $queryLastId = $conn->query("SELECT MAX(ID) AS HighestID FROM Manager WHERE TypeNum = $ResearchGroup");//get Highest ID for this user's Research Group
    if ($queryLastId->num_rows > 0) {
      while($row = $queryLastId->fetch_assoc()) {
          $HighestID=$row["HighestID"];
          echo " HighestID:::".$HighestID;
      }
    }
if($HighestID!=0){
  $queryGroupNumFromHighiestID = $conn->query("SELECT GroupNum FROM Manager WHERE ID = $HighestID AND ExpNum=$expNum");// get GroupNum where the Highest ID (for Research Group) and where Experiment is this user's experiment
  if ($queryGroupNumFromHighiestID->num_rows > 0) {
    while($row = $queryGroupNumFromHighiestID->fetch_assoc()) {
        $LastGroupNum=$row["GroupNum"];
        echo " GroupNum:::".$LastGroupNum;

    }
  }
}
  $queryGetMinAndMaxGroupNum = $conn->query("SELECT MAX(GroupNumber) as max, MIN(GroupNumber) as min FROM Groups WHERE ExpNumber=$expNum");// get min and max for specipic experiment
  if ($queryGetMinAndMaxGroupNum->num_rows > 0) {
    while($row = $queryGetMinAndMaxGroupNum->fetch_assoc()) {
        $min=$row["min"];
        $max=$row["max"];
        echo " max:".$max." min".$min;
    }
  }

  if($LastGroupNum==0){
      $groupNum=$min;
      //echo 0;
  }
  else if($LastGroupNum+1>$max){
    $groupNum=$min;
    //echo 1;
  }
    else {
      $groupNum=$LastGroupNum+1;
      //echo 3;
    }
  return $groupNum;
}

echo " currentGroup:".$groupNum;


//insert Details to Manager Table:
$queryManager= $conn->query("INSERT INTO Manager (ID, UserID, TypeNum,ExpNum, GroupNum ) VALUES (NULL, $UserID, $ResearchGroup, $expNum, $groupNum )");

///****************************add if mobile or pc in the data table in the field "PCorMobile"
$useragent=$_SERVER['HTTP_USER_AGENT'];

$PCorMobile = 1;
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
    $PCorMobile = 2;
}

//insert Details to DATA Table:
if($academicSituation==1 || $academicSituation==3) { // if it is a student
$queryData = $conn->query("INSERT INTO Data (ID, UserID, Date, StartTime, Gender, BirthYear, Education,
  AcademicStatus,StudyStatus,ResearchGroup, ExperimentNumber,GroupType, PCorMobile)
  VALUES (NULL, $UserID, CURDATE(), '$startTime', $gender, $shnatleida, $fieldOfEducation,
  $academicSituation,$studySituation ,$ResearchGroup,$expNum,$groupNum, $PCorMobile)");
}
if($academicSituation==2) { // if it not Academic
  $queryData = $conn->query("INSERT INTO Data (ID, UserID, Date, StartTime, Gender, BirthYear, Education,
    AcademicStatus, Role, Experience,ResearchGroup, ExperimentNumber,GroupType, PCorMobile)
    VALUES (NULL, $UserID, CURDATE(), '$startTime', $gender, $shnatleida, $fieldOfEducation,
    $academicSituation ,$role, $experience,$ResearchGroup,$expNum,$groupNum, $PCorMobile)");
}
if($academicSituation==4 || $academicSituation==6 || $academicSituation==7) {// if it a bachelore degree
  $queryData = $conn->query("INSERT INTO Data (ID, UserID, Date, StartTime, Gender, BirthYear, Education,
    AcademicStatus,degreeType, Role, Experience,ResearchGroup, ExperimentNumber,GroupType, PCorMobile)
    VALUES (NULL, $UserID, CURDATE(), '$startTime', $gender, $shnatleida, $fieldOfEducation,
    $academicSituation,$degreeType ,$role, $experience,$ResearchGroup,$expNum,$groupNum, $PCorMobile)");
}
if($academicSituation==5) {
  $queryData = $conn->query("INSERT INTO Data (ID, UserID, Date, StartTime, Gender, BirthYear, Education,
    AcademicStatus,ResearchGroup, ExperimentNumber,GroupType, PCorMobile)
    VALUES (NULL, $UserID, CURDATE(), '$startTime', $gender, $shnatleida, $fieldOfEducation,
    $academicSituation,$ResearchGroup,$expNum,$groupNum, $PCorMobile)");
}


echo " array:"."<br>";
echo "".$arrayOfOrderedExps[0];echo "<br>";
echo "".$arrayOfOrderedExps[1];echo "<br>";
echo "".$arrayOfOrderedExps[2];echo "<br>";
echo "".$arrayOfOrderedExps[3];echo "<br>";
echo "<br>";
echo " groupNum is: ".$groupNum. "<br>";
echo " exp is: ".$expNum. "<br>";


      if ($groupNum == 1)
      header("Location: gameExperimentNew/moneyGame-Team.html");
      if ($groupNum == 2)
      header("Location: gameExperimentNew/noMoneyGame-Team.html");
      if ($groupNum == 3)
      header("Location: questionnaireExperiment/moneyPriming-Team.html");
      if ($groupNum == 4)
      header("Location: questionnaireExperiment/reviewTeam-Pic1.html");
      if ($groupNum == 5)
      header("Location: questionnaireExperiment/reviewTeam-Pic2.html");
      if ($groupNum == 6)
      header("Location: questionnaireExperiment/moneyPriming-Team.html");
      if ($groupNum == 7)
      header("Location: questionnaireExperiment/reviewTeam-Pic1.html");
      if ($groupNum == 8)
      header("Location: questionnaireExperiment/reviewTeam-Pic2.html");
      if ($groupNum == 9)
      header("Location: gameExperimentNew/moneyAnnouncment.php?num=9");
      //header("Location: gameExperimentNew/moneyGame-Team.html"); // need to replace to the moneyAnnouncement page
      if ($groupNum == 10)
      header("Location: gameExperimentNew/moneyAnnouncment.php?num=10");
      //header("Location: gameExperimentNew/noMoneyGame-Team.html"); // need to replace to the moneyAnnouncement page
      if ($groupNum == 11)
      header("Location: gameExperimentNew/moneyGame-Team.html");
      if ($groupNum == 12)
      header("Location: gameExperimentNew/noMoneyGame-Team.html");
      if ($groupNum == 13)
      header("Location: questionnaireExperiment/text1.php");
      if ($groupNum == 14)
      header("Location: questionnaireExperiment/text2.php");

      if ($groupNum == 0) {
        $sql = "update Data
        set ExperimentNumber=0
        where UserID = $UserID";
        $conn->query($sql);

        // require_once('PHPMailer/PHPMailerAutoLoad.php');
        //
        // $mail = new PHPMailer();
        // $mail->CharSet = 'UTF-8';
        // $mail->isSMTP();
        // $mail->SMTPAuth = true;
        // $mail->SMTPSecure = 'ssl';
        // $mail->Host = 'smtp.gmail.com';
        // $mail->Port ='465';
        // $mail->isHTML();
        // $mail->Username = 'studyHaifa@gmail.com';
        // $mail->Password = 'study2017';
        // $mail->SetFrom('no-reply@gmail.com');
        // $subject = 'Counter Limit';
        // $mail->Subject = $subject;
        // $comment = 'Counter has reached the limit for research group number:'.$ResearchGroup;
        // $mail->Body = $comment;
        // $mail->AddAddress('studyHaifa@gmail.com');
        // $mail->Send();

        header("Location: detailsToContact.php");
      }

$conn->close();


 ?>
