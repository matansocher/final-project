<?php
session_start();

//header('Content-Type: application/json');

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

$result = $conn->query("SELECT * FROM Data");
$string="<table class='table table-hover table-bordered table-responsive'>";
//headers
$string.="<thead>";
$string.="<th>מספר סידורי</th>";
$string.="<th>מזהה משתמש</th>";
$string.="<th>תאריך</th>";
$string.="<th>שעת התחלה</th>";
$string.="<th>שעת סיום</th>";
$string.="<th>מגדר</th>";
$string.="<th>שנת לידה</th>";
$string.="<th>תחום השכלה</th>";
$string.="<th>מצב אקדמי</th>";
$string.="<th>סוג תואר אקדמי</th>";
$string.="<th>מצב לימודים</th>";
$string.="<th>תחום תפקיד</th>";
$string.="<th>ותק</th>";
$string.="<th>קבוצת מחקר</th>";
$string.="<th>מספר ניסוי</th>";
$string.="<th>קבוצת מדגם</th>";
$string.="<th>משפט</th>";
$string.="<th>panas1</th>";
$string.="<th>panas2</th>";
$string.="<th>panas3</th>";
$string.="<th>panas4</th>";
$string.="<th>panas5</th>";
$string.="<th>panas6</th>";
$string.="<th>panas7</th>";
$string.="<th>panas8</th>";
$string.="<th>panas9</th>";
$string.="<th>panas10</th>";
$string.="<th>panas11</th>";
$string.="<th>panas12</th>";
$string.="<th>panas13</th>";
$string.="<th>panas14</th>";
$string.="<th>panas15</th>";
$string.="<th>panas16</th>";
$string.="<th>panas17</th>";
$string.="<th>panas18</th>";
$string.="<th>panas19</th>";
$string.="<th>panas20</th>";
$string.="<th>מספר בחירות אישיות</th>";
$string.="<th>מספר בחירות קבוצתיות</th>";
$string.="<th>העדפה 1</th>";
$string.="<th>העדפה 2</th>";
$string.="<th>העדפה 3</th>";
$string.="<th>העדפה 4</th>";
$string.="<th>העדפה 5</th>";
$string.="<th>העדפה 6</th>";
$string.="<th>העדפה 7</th>";
$string.="<th>העדפה 8</th>";
$string.="<th>העדפה 9</th>";
$string.="<th>העדפה 10</th>";
$string.="<th>העדפה 11</th>";
$string.="<th>לבד או בקבוצה</th>";
$string.="<th>דירוג לבד או בקבוצה</th>";
$string.="<th>מספר שניות</th>";
$string.="<th>האם מצא</th>";
$string.="<th>הערה</th>";
$string.="<th>האם סיים</th>";
$string.="<th>מספר טלפון</th>";
$string.="<th>מייל</th>";
$string.="<th>סכום לתרומה</th>";
$string.="<th>עמותה לתרומה</th>";
$string.="<th>סכום לקבלה</th>";
$string.="<th>מייל פאיפאל</th>";
$string.="<th>טלפון - סלאריקס</th>";
$string.="<th>טלפון - ביט</th>";
$string.="<th>שם להמחאה</th>";
$string.="<th>כתובת להמחאה</th>";

$string.="</thead>";
//data
$string.="<tbody>";
while($row = $result->fetch_assoc()){
  $string.="<tr>";
  $string.="<td>".$row["ID"]."</td>";
  $string.="<td>".$row["UserID"]."</td>";
  $string.="<td>".$row["Date"]."</td>";
  $string.="<td>".$row["StartTime"]."</td>";
  $string.="<td>".$row["EndTime"]."</td>";
  $string.="<td>".$row["Gender"]."</td>";
  $string.="<td>".$row["BirthYear"]."</td>";
  $string.="<td>".$row["Education"]."</td>";
  $string.="<td>".$row["AcademicStatus"]."</td>";
  $string.="<td>".$row["degreeType"]."</td>";
  $string.="<td>".$row["StudyStatus"]."</td>";
  $string.="<td>".$row["Role"]."</td>";
  $string.="<td>".$row["Experience"]."</td>";
  $string.="<td>".$row["ResearchGroup"]."</td>";
  $string.="<td>".$row["ExperimentNumber"]."</td>";
  $string.="<td>".$row["GroupType"]."</td>";
  $string.="<td>".$row["Sentence"]."</td>";
  $string.="<td>".$row["Panas1"]."</td>";
  $string.="<td>".$row["Panas2"]."</td>";
  $string.="<td>".$row["Panas3"]."</td>";
  $string.="<td>".$row["Panas4"]."</td>";
  $string.="<td>".$row["Panas5"]."</td>";
  $string.="<td>".$row["Panas6"]."</td>";
  $string.="<td>".$row["Panas7"]."</td>";
  $string.="<td>".$row["Panas8"]."</td>";
  $string.="<td>".$row["Panas9"]."</td>";
  $string.="<td>".$row["Panas10"]."</td>";
  $string.="<td>".$row["Panas11"]."</td>";
  $string.="<td>".$row["Panas12"]."</td>";
  $string.="<td>".$row["Panas13"]."</td>";
  $string.="<td>".$row["Panas14"]."</td>";
  $string.="<td>".$row["Panas15"]."</td>";
  $string.="<td>".$row["Panas16"]."</td>";
  $string.="<td>".$row["Panas17"]."</td>";
  $string.="<td>".$row["Panas18"]."</td>";
  $string.="<td>".$row["Panas19"]."</td>";
  $string.="<td>".$row["Panas20"]."</td>";
  $string.="<td>".$row["NumOfPersonalChoises"]."</td>";
  $string.="<td>".$row["NumOfTeamChoises"]."</td>";
  $string.="<td>".$row["Preferences1"]."</td>";
  $string.="<td>".$row["Preferences2"]."</td>";
  $string.="<td>".$row["Preferences3"]."</td>";
  $string.="<td>".$row["Preferences4"]."</td>";
  $string.="<td>".$row["Preferences5"]."</td>";
  $string.="<td>".$row["Preferences6"]."</td>";
  $string.="<td>".$row["Preferences7"]."</td>";
  $string.="<td>".$row["Preferences8"]."</td>";
  $string.="<td>".$row["Preferences9"]."</td>";
  $string.="<td>".$row["Preferences10"]."</td>";
  $string.="<td>".$row["Preferences11"]."</td>";
  $string.="<td>".$row["AloneOrTogether"]."</td>";
  $string.="<td>".$row["PreferenceRank"]."</td>";
  $string.="<td>".$row["HelpSeconds"]."</td>";
  $string.="<td>".$row["ifFound"]."</td>";
  $string.="<td>".$row["Comment"]."</td>";
  $string.="<td>".$row["Finished"]."</td>";
  $string.="<td>".$row["PhoneNumber"]."</td>";
  $string.="<td>".$row["Mail"]."</td>";
  $string.="<td>".$row["DonationAmount"]."</td>";
  $string.="<td>".$row["DonationAssociationName"]."</td>";
  $string.="<td>".$row["AmountToRecieve"]."</td>";
  $string.="<td>".$row["PaypalMail"]."</td>";
  $string.="<td>".$row["CellarixPhone"]."</td>";
  $string.="<td>".$row["BitPhone"]."</td>";
  $string.="<td>".$row["CheckName"]."</td>";
  $string.="<td>".$row["CheckAddress"]."</td>";
  $string.="</tr>";
}
$string.="</tbody>";
$string.="</table>";

echo $string;

$conn->close();
  ?>
