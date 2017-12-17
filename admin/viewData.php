
<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['currentUser'])){
  header("Location: login/login.php");
}
//
//
//   $servername = "li1415-114.members.linode.com";
//   $username = "exp";
//   $password = "y164p13";
//   $db = "exp";
//
//   // Create connection
//   $conn = new mysqli($servername, $username, $password, $db);
// $conn->query("set names 'utf8'");
//   // Check connection
//   if ($conn->connect_error) {
//       die("Connection failed: " . $conn->connect_error);
//   }
//
//
//  /* Create table doesn't return a resultset */
//  if ($conn->query("CREATE TEMPORARY TABLE myCity LIKE Data") === TRUE) {
//      printf("Table myCity successfully created.\n");
//  }
//
//  /* Select queries return a resultset */
//  if ($result = $conn->query("SELECT UserID FROM Data LIMIT 10")) {
//      printf("Select returned %d rows.\n", $result->num_rows);
//
//      /* free result set */
//      $result->close();
 //}

 // /* If we have to retrieve large amount of data we use MYSQLI_USE_RESULT */
 // if ($result = $conn->query("SELECT * FROM Data", MYSQLI_USE_RESULT)) {
 //
 //     /* Note, that we can't execute any functions which interact with the
 //        server until result set was closed. All calls will return an
 //        'out of sync' error */
 //     if (!$conn->query("SET @a:='this will not work'")) {
 //         printf("Error: %s\n", $conn->error);
 //     }
 //     $result->close();
 // }


 ?>
<html lang="he">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Experiment Management</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>

        <style media="screen">
        body{
          direction: rtl;
        }
          table,th,td,tr{
            direction: rtl;
            text-align: right;;
            background-color: #ffffff;
            border: 1px solid black;
            border-collapse: collapse;
          }
          th{
            background-color: #b3c6ff;
            font-size: 13px;
            width: 500px;
          }
          td{
            font-size: 12px;
            width: 500px;
          }
        </style>
    </head>

    <body>
      <br>
      <div id="dataTbl">

      </div>
    </body>
</html>

    <script type="text/javascript">

    $(document).ready(function() {
      $.ajax({
          type: "GET",
          url: "charts/getAllDataFullTable.php",
          success: function(data){
        $("#dataTbl").append(data);
      }

    });
    });
        //
        //
        // $.getJSON('charts/getAllData2.php', function(data) {
        //   var header="<thead><tr><th>מזהה משתמש</th><th>תאריך</th><th>שעת התחלה</th><th>שעת סיום</th>"+
        //                     "<th>מגדר</th><th>שנת לידה</th><th>תחום השכלה</th><th>מצב אקדמי</th><th>סוג תואר אקדמי</th>"+
        //                     "<th>מצב לימודים</th><th>תחום תפקיד</th><th>ותק</th><th>קבוצת מחקר</th><th>מספר ניסוי</th><th>קבוצת מדגם</th>"+
        //                     "<th>משפט</th><th>panas1</th><th>panas2</th><th>panas3</th><th>panas4</th><th>panas5</th><th>panas6</th><th>panas7</th>"+
        //                     "<th>panas8</th><th>panas9</th><th>panas10</th><th>panas11</th><th>panas12</th><th>panas13</th><th>panas14</th><th>panas15</th><th>panas16</th>"+
        //                     "<th>panas17</th><th>panas18</th><th>panas19</th><th>panas20</th></tr></thead>";
        //       $('#dataTbl').append(header);
        //     $.each(data, function(index,value) {
        //           var add = "";
        //           add += "<tr>"
        //           +"<td><b>"+value.ID+"</b></td>"
        //           +"<td>"+value.Date+"</td>"
        //           +"<td>"+value.StartTime+"</td>"
        //           +"<td>"+value.EndTime+"</td>"
        //           +"<td>"+value.Gender+"</td>"
        //           +"<td>"+value.BirthYear+"</td>"
        //           +"<td>"+value.Education+"</td>"
        //           +"<td>"+value.AcademicStatus+"</td>"
        //           +"<td>"+value.degreeType+"</td>"
        //           +"<td>"+value.StudyStatus+"</td>"
        //           +"<td>"+value.Role+"</td>"
        //           +"<td>"+value.Experience+"</td>"
        //           +"<td>"+value.ResearchGroup+"</td>"
        //           +"<td>"+value.ExperimentNumber+"</td>"
        //           +"<td>"+value.GroupType+"</td>"
        //           +"<td>"+value.Sentence+"</td>"
        //           +"<td>"+value.Panas1+"</td>"
        //           +"<td>"+value.Panas2+"</td>"
        //           +"<td>"+value.Panas3+"</td>"
        //           +"<td>"+value.Panas4+"</td>"
        //           +"<td>"+value.Panas5+"</td>"
        //           +"<td>"+value.Panas6+"</td>"
        //           +"<td>"+value.Panas7+"</td>"
        //           +"<td>"+value.Panas8+"</td>"
        //           +"<td>"+value.Panas9+"</td>"
        //           +"<td>"+value.Panas10+"</td>"
        //           +"<td>"+value.Panas11+"</td>"
        //           +"<td>"+value.Panas12+"</td>"
        //           +"<td>"+value.Panas13+"</td>"
        //           +"<td>"+value.Panas14+"</td>"
        //           +"<td>"+value.Panas15+"</td>"
        //           +"<td>"+value.Panas16+"</td>"
        //           +"<td>"+value.Panas17+"</td>"
        //           +"<td>"+value.Panas18+"</td>"
        //           +"<td>"+value.Panas19+"</td>"
        //           +"<td>"+value.Panas20+"</td>"
        //           +"</tr>";
        //           $('#dataTbl').append(add);
        //         });
        // });

    </script>
