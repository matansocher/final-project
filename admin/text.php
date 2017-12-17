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
                    <input type="text" class="" placeholder="חיפוש">
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
                        <h2>טקסטים</h2>
                        <hr class="style18">
                      </div>
                  </div>

                  <button class="btn btn-primary" onclick=" window.open('../questionnaireExperiment/text2.php','_blank')">תצוגה מקדימה - דף 2</button>
                  <button class="btn btn-primary" onclick=" window.open('../questionnaireExperiment/text1.php','_blank')">תצוגה מקדימה - דף 1</button>

                  <form class="hebrew" method="post" action="savedata/saveDataText.php" onsubmit="return validate()">
                    <div class="form-group">
                      <h3 class="hebrew">:כותרת טקסט</h3>
                      <textarea type="text" class="hebrew" id="headerText" name="headerText" placeholder="כותרת טקסט"  rows="1" cols="66"></textarea><br>
                      <h3 class="hebrew">:מלל הסבר טקסט</h3>
                      <textarea type="text" class="explanationText hebrew" id="explanationText" name="explanationText" placeholder="מלל הסבר טקסט" rows="4" cols="66"></textarea><br>
                      <h3 class="hebrew">:הודעת שגיאה</h3>
                      <textarea type="text" class="hebrew" id="errorMessage" name="errorMessage" placeholder="הודעת שגיאה"  rows="1" cols="66"></textarea><br>
                      <h3 class="hebrew">:טקסט 1</h3>
                      <textarea type="text" class="text1 hebrew" id="text1" name="text1" placeholder="טקסט 1" rows="10" cols="66"></textarea><br>
                      <h3 class="hebrew">:טקסט 2</h3>
                      <textarea type="text" class="text2 hebrew" id="text2" name="text2" placeholder="טקסט 2"  rows="10" cols="66"></textarea><br>
                    </div>
                  <button type="submit" class="btn btn-primary">שמור  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

                                 </form>
                                 <!-- divsForTextArea -->
                                 <div class="explanationText" id="explanationText1"></div>
                                 <div class="text1" id="text11"></div>
                                 <div class="text2" id="text21"></div>

        <!-- /#page-wrapper -->
    </div>
</div>
<!-- /#wrapper -->
</body>
</html>
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#explanationText1").hide();
            $("#text11").hide();
            $("#text21").hide();
            $.ajax({
                type: "GET",
                url: "../getDataToPages/getDataToText.php",
                success: function(data){
              // data is a string that will return from the db
              // the string will contain all the fields for general page

              var parsed = JSON.parse(data); // get parsed JSON
              var arr = []; // empty array
              for(var x in parsed){
                arr.push(parsed[x]); // push every element to the array
              }

              document.getElementById("headerText").value = arr[2];
              document.getElementById("errorMessage").value = arr[4];

              $("#explanationText1").html(arr[3]);
              var updateTextArea1 = document.getElementById("explanationText1").textContent;
              document.getElementById("explanationText").value = updateTextArea1;

              $("#text11").html(arr[0]);
              var updateTextArea2 = document.getElementById("text11").textContent;
              document.getElementById("text1").value = updateTextArea2;

              $("#text21").html(arr[1]);
              var updateTextArea3 = document.getElementById("text21").textContent;
              document.getElementById("text2").value = updateTextArea3;
                  }
              });
             });

             $(function() {
             $('input:text').keydown(function(e) {
             if(e.keyCode==87)
                 return false;
             });
             });

        </script>

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
                function validate() {
                  var x=$("#explanationText1").html();
                  $("#explanationText").val(x);
                  var y=$("#text11").html();
                  $("#text1").val(y);
                  var z=$("#text21").html();
                  $("#text2").val(z);
                  return true;
                  }
                  $('.explanationText:not(.focus)').keyup(function(){
                      var value = $(this).val();
                      var contentAttr = $(this).attr('name');
                        $('.'+contentAttr+'').html(value.replace(/\r?\n/g,'<br/>'));
                  })
                  $('.text1:not(.focus)').keyup(function(){
                      var value = $(this).val();
                      var contentAttr = $(this).attr('name');
                        $('.'+contentAttr+'').html(value.replace(/\r?\n/g,'<br/>'));
                  })
                  $('.text2:not(.focus)').keyup(function(){
                      var value = $(this).val();
                      var contentAttr = $(this).attr('name');
                        $('.'+contentAttr+'').html(value.replace(/\r?\n/g,'<br/>'));
                  })
            </script>
