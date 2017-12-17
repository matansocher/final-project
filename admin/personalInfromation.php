<?php
session_start();

if(!isset($_SESSION['currentUser'])){
  header("Location: login/login.php");
}

 ?>
<!DOCTYPE html>
<html lang="he">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Experiment Management</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel='stylesheet' type='text/css' href='admin.css'/>
        <script type='text/javascript' src="menu.js"></script>
        </head>

        <body>
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <div class="container-fluid">
            <a class="navbar-brand pull-right" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>

            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
              <a href="adminMain.php"><label id=title>מערכת ניהול ניסויים<img src="logo.png" height="70px"></label></a>
              </ul>
                <ul class="nav navbar-nav navbar-left">
                  <li><a href="login/login.php?logout=true"> התנתק <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
                  <li><a href="messages.php"> הודעות <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
                  <li><a href="userProfile.php"> משתמש <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                  <li><a href="adminMain.php"> ראשי <span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
                </ul>
                <form class="navbar-form navbar-left" action="#" method="GET">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="חיפוש">
                    <div class="input-group-btn">
                      <button class="btn btn-primary" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
        </nav>

        <div id="wrapper" class="toggled">
        <div class="container-fluid">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
              <ul class="menuHeader">


                  <li  data-toggle="collapse" data-target="#products" class="collapsed active nav-header">
                    <a href="#" onclick="changeExpOnMenu()"> ניסויים <span id="expMenu" class="iconMenu"><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a>
                  </li>
                  <ul class="sub-menu collapse nav-open" id="products">

                      <li><a href="exp1.php">ניסוי 1  </a></li>
                      <li><a href="exp2.php">ניסוי 2  </a></li>
                      <li><a href="exp3.php">ניסוי 3  </a></li>
                      <li><a href="exp4.php">ניסוי 4  </a></li>
                      <li><a href="exp5.php">ניסוי 5  </a></li>
                      <li><a href="exp6.php">ניסוי 6  </a></li>

                  </ul>
                  <li id="hrForMenu"></li>
                  <li class="nav-header">
                    <a href="general.php">
                     הגדרות ניסויים <span class="iconMenu"><i class="fa fa-cog" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li id="hrForMenu"></li>
                  <li class="nav-header">
                    <a href="dataPage.php">
            מאגר נתונים  <span class="iconMenu"><i class="fa fa-database" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li id="hrForMenu"></li>
                  <li class="nav-header">
                    <a href="graphs.php">
                  תרשימים <span class="iconMenu"><i class="fa fa-bar-chart" aria-hidden="true"></i></span>
                    </a>
                  </li>

                  <li id="hrForMenu"></li>
                  <li class="nav-header">
                    <a href="messages.php">
                   הודעות <span class="iconMenu glyphicon glyphicon-envelope"></span>
                    </a>
                  </li>
                  <li id="hrForMenu"></li>
                  <li class="nav-header">
                    <a href="moneyPayment.php">
                   <!-- כספים <span class="iconMenu"><i class="fa fa-money" aria-hidden="true"></i></span> -->
                    </a>
                  </li>
              </ul>
            </div>
            <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" text-align="center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-cm-12">
                      <br>
                        <h2>שאלון פרטים אישיים</h2>
                        <hr class="style18">
                      </div>
                  </div>

                  <button class="btn btn-primary" onclick=" window.open('../information.html','_blank')">תצוגה מקדימה</button>

                   <form class="hebrew" method="post" action="savedata/saveDataPersonalInfromation.php">
                     <div class="form-group">
                       <h3 class="hebrew">:כותרת</h3>
                       <textarea class=" hebrew" id="header" name="header" placeholder="כותרת דף פרטים אישיים" rows="1" cols="66"></textarea>
                       <h3 class="hebrew">:הסבר</h3>
                       <textarea class=" hebrew" id="description" name="description" placeholder="הסבר" rows="1" cols="66"></textarea>
                       <h3 class="hebrew">:הודעת שגיאה</h3>
                       <textarea class=" hebrew" id="errorMessage" name="errorMessage" placeholder="הודעת שגיאה" rows="1" cols="66"></textarea>
                       <br><br>
                       <h3 class="hebrew">:שנת לידה</h3>
                       <textarea class=" hebrew" id="birthYearHeader" name="birthYearHeader" placeholder="כותרת שנת לידה" rows="1" cols="66"></textarea>
                       <br><br>
                       <h3 class="hebrew">:מין - תת כותרת</h3>
                       <textarea class=" hebrew" id="genderHeader" name="genderHeader" placeholder="כותרת מין" rows="1" cols="66"></textarea><br>
                       <h3 class="hebrew">:מין - אפשרויות</h3>
                       <textarea class="hebrew" id="gender1" name="gender1" placeholder="מין 1" rows="1" cols="66"></textarea><br>
                       <textarea class="hebrew" id="gender2" name="gender2" placeholder="מין 2" rows="1" cols="66"></textarea><br>
                       <br><br>
                       <h3 class="hebrew">:תחום השכלה - תת כותרת</h3>
                       <textarea class=" hebrew" id="fieldOfEducationHeader" name="fieldOfEducationHeader" placeholder="כותרת תחום השכלה:" rows="1" cols="66"></textarea><br>
                       <h3 class="hebrew">:תחום השכלה - אפשרויות</h3>
                       <textarea class=" hebrew" id="fieldOfEducation1" name="fieldOfEducation1" placeholder="תחום השכלה 1" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="fieldOfEducation2" name="fieldOfEducation2" placeholder="תחום השכלה 2" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="fieldOfEducation3" name="fieldOfEducation3" placeholder="תחום השכלה 3" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="fieldOfEducation4" name="fieldOfEducation4" placeholder="תחום השכלה 4" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="fieldOfEducation5" name="fieldOfEducation5" placeholder="תחום השכלה 5" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="fieldOfEducation6" name="fieldOfEducation6" placeholder="תחום השכלה 6" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="fieldOfEducation7" name="fieldOfEducation7" placeholder="תחום השכלה 7" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="fieldOfEducation8" name="fieldOfEducation8" placeholder="תחום השכלה 8" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="fieldOfEducation9" name="fieldOfEducation9" placeholder="תחום השכלה 9" rows="1" cols="66"></textarea><br>
                       <br><br>
                        <h3 class="hebrew">:מצב אקדמי - תת כותרת</h3>
                        <textarea class=" hebrew" id="academicSituationHeader" name="academicSituationHeader" placeholder="כותרת מצב אקדמי" rows="1" cols="66"></textarea><br>
                        <h3 class="hebrew">:מצב אקדמי - אפשרויות</h3>
                        <textarea class=" hebrew" id="academicSituation1" name="academicSituation1" placeholder="מצב אקדמי 1" rows="1" cols="66"></textarea><br>
                        <textarea class=" hebrew" id="academicSituation2" name="academicSituation2" placeholder="מצב אקדמי 2" rows="1" cols="66"></textarea><br>
                        <textarea class=" hebrew" id="academicSituation3" name="academicSituation3" placeholder="מצב אקדמי 3" rows="1" cols="66"></textarea><br>
                        <textarea class=" hebrew" id="academicSituation4" name="academicSituation4" placeholder="מצב אקדמי 4" rows="1" cols="66"></textarea><br>
                        <textarea class=" hebrew" id="academicSituation5" name="academicSituation5" placeholder="מצב אקדמי 5" rows="1" cols="66"></textarea><br>
                        <textarea class=" hebrew" id="academicSituation6" name="academicSituation6" placeholder="מצב אקדמי 6" rows="1" cols="66"></textarea><br>
                        <textarea class=" hebrew" id="academicSituation7" name="academicSituation7" placeholder="מצב אקדמי 7" rows="1" cols="66"></textarea><br>
                       <br><br>
                       <h3 class="hebrew">:שנת לימודים - תת כותרת</h3>
                       <textarea  class=" hebrew" id="studySituationHeader" name="studySituationHeader" placeholder="כותרת שנת לימודים" rows="1" cols="66"></textarea><br>
                       <h3 class="hebrew">:שנת לימודים - אפשרויות</h3>
                       <textarea class=" hebrew" id="studySituation1" name="studySituation1" placeholder="שנת לימודים 1" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="studySituation2" name="studySituation2" placeholder="שנת לימודים 2" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="studySituation3" name="studySituation3" placeholder="שנת לימודים 3" rows="1" cols="66"></textarea><br>
                       <textarea class=" hebrew" id="studySituation4" name="studySituation4" placeholder="שנת לימודים 4" rows="1" cols="66"></textarea><br>
                       <br><br>
                        <h3 class="hebrew">:סוג תואר אקדמי - תת כותרת</h3>
                        <textarea class=" hebrew" id="degreeTypeHeader" name="degreeTypeHeader" placeholder="כותרת סוג תואר אקדמי" rows="1" cols="66"></textarea><br>
                        <h3 class="hebrew">:סוג תואר אקדמי - אפשרויות</h3>
                        <textarea class=" hebrew" id="degreeType1" name="degreeType1" placeholder="סוג תואר אקדמי 1" rows="1" cols="66"></textarea><br>
                        <textarea class=" hebrew" id="degreeType2" name="degreeType2" placeholder="סוג תואר אקדמי 2" rows="1" cols="66"></textarea><br>
                        <textarea class=" hebrew" id="degreeType3" name="degreeType3" placeholder="סוג תואר אקדמי 3" rows="1" cols="66"></textarea><br>
                       <br><br>
                        <h3 class="hebrew">:תחום התפקיד - תת כותרת</h3>
                        <textarea class=" hebrew" id="roleHeader" name="roleHeader" placeholder="כותרת תחום תפקיד"  rows="1" cols="66"></textarea><br>
                        <h3 class="hebrew">:תחום התפקיד - אפשרויות</h3>
                        <textarea class=" hebrew" id="role1" name="role1" placeholder="תחום תפקיד 1" rows="1" cols="66"></textarea><br>
                        <textarea class=" hebrew" id="role2" name="role2" placeholder="תחום תפקיד 2" rows="1" cols="66"></textarea><br>
                       <br><br>
                       <h3 class="hebrew">:ותק - תת כותרת</h3>
                       <textarea class=" hebrew" id="experienceHeader" name="experienceHeader" placeholder="כותרת תחום תפקיד" rows="1" cols="66"></textarea><br>
                     </div>
                     <button type="submit" class="btn btn-primary">שמור  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

                   </form>


        <!-- /#page-wrapper -->
    </div>
</div>
<!-- /#wrapper -->

        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <script type='text/javascript'>

        $(document).ready(function() {

            $("#menu-toggle").click(function(e) {
              e.preventDefault();
              $("#wrapper").toggleClass("toggled");

              $('.tree-toggle').click(function () {
                  $(this).parent().children('ul.tree').toggle(100);
                });
              $(function(){
              $('.tree-toggle').parent().children('ul.tree').toggle(100);
                })
    });

        });

    </script>

    </body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "../getDataToPages/getDataToPersonalInformation.php",
        success: function(data){
      // data is a string that will return from the db
      // the string will contain all the fields for general page

      var parsed = JSON.parse(data); // get parsed JSON
      var arr = []; // empty array
      for(var x in parsed){
        arr.push(parsed[x]); // push every element to the array
      }

      document.getElementById("header").value = arr[0];
      document.getElementById("description").value = arr[1];
      document.getElementById("errorMessage").value = arr[2];

      document.getElementById("birthYearHeader").value = arr[3];

      document.getElementById("genderHeader").value = arr[4];
      document.getElementById("gender1").value = arr[5];
      document.getElementById("gender2").value = arr[6];

      document.getElementById("fieldOfEducationHeader").value = arr[7];
      document.getElementById("fieldOfEducation1").value = arr[8];
      document.getElementById("fieldOfEducation2").value = arr[9];
      document.getElementById("fieldOfEducation3").value = arr[10];
      document.getElementById("fieldOfEducation4").value = arr[11];
      document.getElementById("fieldOfEducation5").value = arr[12];
      document.getElementById("fieldOfEducation6").value = arr[13];
      document.getElementById("fieldOfEducation7").value = arr[14];
      document.getElementById("fieldOfEducation8").value = arr[15];
      document.getElementById("fieldOfEducation9").value = arr[16];

      document.getElementById("academicSituationHeader").value = arr[17];
      document.getElementById("academicSituation1").value = arr[18];
      document.getElementById("academicSituation2").value = arr[19];
      document.getElementById("academicSituation3").value = arr[20];
      document.getElementById("academicSituation4").value = arr[21];
      document.getElementById("academicSituation5").value = arr[22];
      document.getElementById("academicSituation6").value = arr[23];
      document.getElementById("academicSituation7").value = arr[24];

      document.getElementById("studySituationHeader").value = arr[25];
      document.getElementById("studySituation1").value = arr[26];
      document.getElementById("studySituation2").value = arr[27];
      document.getElementById("studySituation3").value = arr[28];
      document.getElementById("studySituation4").value = arr[29];

      document.getElementById("degreeTypeHeader").value = arr[30];
      document.getElementById("degreeType1").value = arr[31];
      document.getElementById("degreeType2").value = arr[32];
      document.getElementById("degreeType3").value = arr[33];

      document.getElementById("roleHeader").value = arr[34];
      document.getElementById("role1").value = arr[35];
      document.getElementById("role2").value = arr[36];

      document.getElementById("experienceHeader").value = arr[37];

          }
      });
     });

     $(function() {
     $('input:text').keydown(function(e) {
     if(e.keyCode==87)
         return false;
     });
     });

     $(function() {
     $("#comment").keydown(function(e) {
     if(e.keyCode==87)
         return false;
     });
     });
</script>
