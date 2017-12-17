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
                        <h2>השלמת משפטים</h2>
                        <hr class="style18">
                      </div>
                  </div>

                  <button class="btn btn-primary" onclick=" window.open('../gameExperimentNew/moneyGame-Team.html','_blank')">תצוגה מקדימה</button>

                  <form class="hebrew" method="post" action="savedata/saveDataSentenceCompletion.php">
                    <div class="form-group">
                      <h3 class="hebrew">:כותרת</h3>
                      <textarea type="text" class="  hebrew" id="headerSentence" name="headerSentence" placeholder="כותרת דף משפט" rows="1" cols="66"></textarea><br>
                      <h3 class="hebrew">  :הסבר</h3>
                       <textarea type="text" class="  hebrew" id="explanationSentence" name="explanationSentence" placeholder="מלל הסבר דף משפט" rows="1" cols="66"></textarea><br>
                      <h3 class="hebrew">:הודעת שגיאה</h3>
                       <textarea type="text" class="  hebrew" id="errorMessage" name="errorMessage" placeholder="הודעת שגיאה" rows="1" cols="66"></textarea><br>
                      <h3 class="hebrew">:מילים - כסף</h3>
                      <table width="100%">

                        <tr>
                          <td width="18%"><input type="text" class="  hebrew" id="money11" name="money11" placeholder="משפט 1, מילה 1"></td>
                          <td width="18%"><input type="text" class="  hebrew" id="money12" name="money12" placeholder="משפט 1, מילה 2"></td>
                          <td width="18%"><input type="text" class="  hebrew" id="money13" name="money13" placeholder="משפט 1, מילה 3"></td>
                          <td width="18%"><input type="text" class="  hebrew" id="money14" name="money14" placeholder="משפט 1, מילה 4"></td>
                          <td width="18"><input type="text" class="  hebrew" id="money15" name="money15" placeholder="משפט 1, מילה 5"></td>
                          <td width="10%"><h4 class="hebrew">:משפט 1</h4></td>
                        </tr>
                        <tr>
                          <td><input type="text" class="  hebrew" id="money21" name="money21" placeholder="משפט 2, מילה 1"></td>
                          <td><input type="text" class="  hebrew" id="money22" name="money22" placeholder="משפט 2, מילה 2"></td>
                          <td><input type="text" class="  hebrew" id="money23" name="money23" placeholder="משפט 2, מילה 3"></td>
                          <td><input type="text" class="  hebrew" id="money24" name="money24" placeholder="משפט 2, מילה 4"></td>
                          <td><input type="text" class="  hebrew" id="money25" name="money25" placeholder="משפט 2, מילה 5"></td>
                          <td><h4 class="hebrew">:משפט 2</h4></td>
                        </tr>

                        <tr>
                          <td><input type="text" class="  hebrew" id="money31" name="money31" placeholder="משפט 3, מילה 1"></td>
                          <td><input type="text" class="  hebrew" id="money32" name="money32" placeholder="משפט 3, מילה 2"></td>
                          <td><input type="text" class="  hebrew" id="money33" name="money33" placeholder="משפט 3, מילה 3"></td>
                          <td><input type="text" class="  hebrew" id="money34" name="money34" placeholder="משפט 3, מילה 4"></td>
                          <td><input type="text" class="  hebrew" id="money35" name="money35" placeholder="משפט 3, מילה 5"></td>
                          <td><h4 class="hebrew">:משפט 3</h4></td>
                        </tr>
                      </table>
                      <h3 class="hebrew">:מילים - כללי</h3>
                      <table class="hebrew" width="100%">

                        <tr>
                          <td width="18%"><input type="text" class="  hebrew" id="general11" name="general11" placeholder="משפט 1, מילה 1"></td>
                          <td width="18%"><input type="text" class="  hebrew" id="general12" name="general12" placeholder="משפט 1, מילה 2"></td>
                          <td width="18%"><input type="text" class="  hebrew" id="general13" name="general13" placeholder="משפט 1, מילה 3"></td>
                          <td width="18%"><input type="text" class="  hebrew" id="general14" name="general14" placeholder="משפט 1, מילה 4"></td>
                          <td width="18%"><input type="text" class="  hebrew" id="general15" name="general15" placeholder="משפט 1, מילה 5"></td>
                          <td width="10%"><h4 class="hebrew">:משפט 4</h4></td>
                        </tr>

                        <tr>
                          <td><input type="text" class="  hebrew" id="general21" name="general21" placeholder="משפט 2, מילה 1"></td>
                          <td><input type="text" class="  hebrew" id="general22" name="general22" placeholder="משפט 2, מילה 2"></td>
                          <td><input type="text" class="  hebrew" id="general23" name="general23" placeholder="משפט 2, מילה 3"></td>
                          <td><input type="text" class="  hebrew" id="general24" name="general24" placeholder="משפט 2, מילה 4"></td>
                          <td><input type="text" class="  hebrew" id="general25" name="general25" placeholder="משפט 2, מילה 5"></td>
                          <td><h4 class="hebrew">:משפט 5</h4></td>
                        </tr>

                        <tr>
                          <td><input type="text" class="  hebrew" id="general31" name="general31" placeholder="משפט 3, מילה 1"></td>
                          <td><input type="text" class="  hebrew" id="general32" name="general32" placeholder="משפט 3, מילה 2"></td>
                          <td><input type="text" class="  hebrew" id="general33" name="general33" placeholder="משפט 3, מילה 3"></td>
                          <td><input type="text" class="  hebrew" id="general34" name="general34" placeholder="משפט 3, מילה 4"></td>
                          <td><input type="text" class="  hebrew" id="general35" name="general35" placeholder="משפט 3, מילה 5"></td>
                          <td><h4 class="hebrew">:משפט 6</h4></td>
                        </tr>
                      </table>
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
        url: "../getDataToPages/getDataToSentenceCompletion.php",
        success: function(data){
      // data is a string that will return from the db
      // the string will contain all the fields for general page

      var parsed = JSON.parse(data); // get parsed JSON
      var arr = []; // empty array
      for(var x in parsed){
        arr.push(parsed[x]); // push every element to the array
      }

      document.getElementById("money11").value = arr[0];
      document.getElementById("money12").value = arr[1];
      document.getElementById("money13").value = arr[2];
      document.getElementById("money14").value = arr[3];
      document.getElementById("money15").value = arr[4];
      document.getElementById("money21").value = arr[5];
      document.getElementById("money22").value = arr[6];
      document.getElementById("money23").value = arr[7];
      document.getElementById("money24").value = arr[8];
      document.getElementById("money25").value = arr[9];
      document.getElementById("money31").value = arr[10];
      document.getElementById("money32").value = arr[11];
      document.getElementById("money33").value = arr[12];
      document.getElementById("money34").value = arr[13];
      document.getElementById("money35").value = arr[14];
      document.getElementById("general11").value = arr[15];
      document.getElementById("general12").value = arr[16];
      document.getElementById("general13").value = arr[17];
      document.getElementById("general14").value = arr[18];
      document.getElementById("general15").value = arr[19];
      document.getElementById("general21").value = arr[20];
      document.getElementById("general22").value = arr[21];
      document.getElementById("general23").value = arr[22];
      document.getElementById("general24").value = arr[23];
      document.getElementById("general25").value = arr[24];
      document.getElementById("general31").value = arr[25];
      document.getElementById("general32").value = arr[26];
      document.getElementById("general33").value = arr[27];
      document.getElementById("general34").value = arr[28];
      document.getElementById("general35").value = arr[29];

      document.getElementById("headerSentence").value = arr[30];
      document.getElementById("explanationSentence").value = arr[31];
      document.getElementById("errorMessage").value = arr[32];

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
