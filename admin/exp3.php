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
                        <h1>ניסוי 3</h1>
                        <hr class="style18">
                      <div class="content">

                        <a href="startpage.php" class="myButton">דף פתיחה</a><br><br>
                        <a href="personalInfromation.php" class="myButton">שאלון פרטים אישיים</a><br><br>
                        <a href="pictures.php" class="myButton">תמונות</a><br><br>
                        <a href="panas.php" class="myButton">Panas</a><br><br>
                        <a href="preferences2.php" class="myButton">שאלון העדפות 2</a><br><br>
                        <a href="advertisment.php" class="myButton">משימת פרסומת</a><br>
                          </div>
                        </div>
                    </div>
            </div>
        </div>
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
