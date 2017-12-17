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
                        <h2>שאלון העדפות 1</h2>
                        <hr class="style18">
                      </div>
                  </div>

                  <button class="btn btn-primary" onclick=" window.open('../questionnaireExperiment/preferences11.php','_blank')">תצוגה מקדימה - דף 2</button>
                  <button class="btn btn-primary" onclick=" window.open('../questionnaireExperiment/preferences12.php','_blank')">תצוגה מקדימה - דף 1</button>

                  <form class="hebrew" method="post" action="savedata/saveDataPreferences1.php"  onsubmit="return validate()">
                    <div class="form-group">
                      <h3 class="hebrew">:כותרת שאלון העדפות 1</h3>
                       <textarea type="text" class=" hebrew" id="headerPreferences" name="headerPreferences" placeholder="כותרת שאלון העדפות 1"  rows="1" cols="66"></textarea><br>
                      <h3 class="hebrew">:מלל הסבר שאלון העדפות 1</h3>
                       <textarea type="text" class="explanationPreferences hebrew" id="explanationPreferences" name="explanationPreferences" placeholder="מלל הסבר שאלון העדפות 1" rows="4" cols="66"></textarea><br>
                      <h3 class="hebrew">:הודעת שגיאה</h3>
                       <textarea type="text" class=" hebrew" id="errorMessage" name="errorMessage" placeholder="הודעת שגיאה" rows="1" cols="66"></textarea><br>
                      <h3 class="hebrew">:כותרת משנה</h3>
                       <textarea type="text" class=" hebrew" id="littleDescription" name="littleDescription" placeholder="הסבר קצר" rows="1" cols="66"></textarea><br>
                       <h3 class="hebrew">:אפשרויות</h3>
                        <textarea type="text" class=" hebrew" id="option1" name="option1" placeholder="אפשרות 1" rows="1" cols="66"></textarea><br>
                         <textarea type="text" class=" hebrew" id="option2" name="option2" placeholder="אפשרות 2"  rows="1" cols="66"></textarea><br>
                      <h3 class="hebrew">:שאלון העדפות</h3>
                       <textarea type="text" class=" hebrew" id="preference1" name="preference1" placeholder="אפשרות 1" rows="1" cols="66"></textarea><br>
                        <textarea type="text" class=" hebrew" id="preference2" name="preference2" placeholder="אפשרות 2" rows="1" cols="66"></textarea><br>
                         <textarea type="text" class=" hebrew" id="preference3" name="preference3" placeholder="אפשרות 3" rows="1" cols="66"></textarea><br>
                          <textarea type="text" class=" hebrew" id="preference4" name="preference4" placeholder="אפשרות 4" rows="1" cols="66"></textarea><br>
                           <textarea type="text" class=" hebrew" id="preference5" name="preference5" placeholder="אפשרות 5" rows="1" cols="66"></textarea><br>
                            <textarea type="text" class=" hebrew" id="preference6" name="preference6" placeholder="אפשרות 6" rows="1" cols="66"></textarea><br>
                             <textarea type="text" class=" hebrew" id="preference7" name="preference7" placeholder="אפשרות 7" rows="1" cols="66"></textarea><br>
                              <textarea type="text" class=" hebrew" id="preference8" name="preference8" placeholder="אפשרות 8" rows="1" cols="66"></textarea><br>
                               <textarea type="text" class=" hebrew" id="preference9" name="preference9" placeholder="אפשרות 9" rows="1" cols="66"></textarea><br>
                                <textarea type="text"  class=" hebrew" id="preference10" name="preference10" placeholder="אפשרות 10" rows="1" cols="66"></textarea><br>
                                 <textarea type="text" class=" hebrew" id="preference11" name="preference11" placeholder="אפשרות 11" rows="1" cols="66"></textarea><br>

                    </div>
                  <button type="submit" class="btn btn-primary">שמור  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

                                 </form>
                                 <!-- divsForTextArea -->
                                 <div class="explanationPreferences" id="explanationPreferences1"></div>

        <!-- /#page-wrapper -->
    </div>
</div>
<!-- /#wrapper -->

        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <script type='text/javascript'>

        $(document).ready(function() {
          $("#explanationPreferences1").hide();
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

                function validate() {
                  var x=$("#explanationPreferences1").html();
                  $("#explanationPreferences").val(x);
                  return true;
                  }

                  $('.explanationPreferences:not(.focus)').keyup(function(){
                      var value = $(this).val();
                      var contentAttr = $(this).attr('name');
                        $('.'+contentAttr+'').html(value.replace(/\r?\n/g,'<br/>'));
                  })
    </script>

    </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "../getDataToPages/getDataToPreferences1.php",
        success: function(data){
      // data is a string that will return from the db
      // the string will contain all the fields for general page

      var parsed = JSON.parse(data); // get parsed JSON
      var arr = []; // empty array
      for(var x in parsed){
        arr.push(parsed[x]); // push every element to the array
      }

      document.getElementById("preference1").value = arr[0];
      document.getElementById("preference2").value = arr[1];
      document.getElementById("preference3").value = arr[2];
      document.getElementById("preference4").value = arr[3];
      document.getElementById("preference5").value = arr[4];
      document.getElementById("preference6").value = arr[5];
      document.getElementById("preference7").value = arr[6];
      document.getElementById("preference8").value = arr[7];
      document.getElementById("preference9").value = arr[8];
      document.getElementById("preference10").value = arr[9];
      document.getElementById("preference11").value = arr[10];
      document.getElementById("headerPreferences").value = arr[11];
      $("#explanationPreferences1").html(arr[12]);
      var updateTextArea1 = document.getElementById("explanationPreferences1").textContent;
      document.getElementById("explanationPreferences").value = updateTextArea1;
      document.getElementById("errorMessage").value = arr[13];
      document.getElementById("littleDescription").value = arr[14];
      document.getElementById("option1").value = arr[15];
      document.getElementById("option2").value = arr[16];
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
