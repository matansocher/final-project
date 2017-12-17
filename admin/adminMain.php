
<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['currentUser'])){
  header("Location: login/login.php");
}
 ?>

<html lang="he">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Experiment Management</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel='stylesheet' type='text/css' href='admin.css'/>
        <script type='text/javascript' src="menu.js"></script>
            <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
            <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
            <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>
    </head>
    <style media="screen">
      table,th,td,tr{
        direction: rtl;
        text-align: right;;
        background-color: #ffffff;
      }
      th{
        background-color: #b3c6ff;
        font-size: 13px;
      }
      td{
        font-size: 12px;
      }

      .panel-body{height:350px;overflow-y:scroll}.login-panel{margin-top:25%}.flot-chart{height:400px}.flot-chart-content{width:100%;height:100%}table.dataTable thead .sorting,table.dataTable thead .sorting_asc,table.dataTable thead .sorting_asc_disabled,table.dataTable thead .sorting_desc,table.dataTable thead .sorting_desc_disabled{background:0 0}table.dataTable thead
      .sorting_asc:after{content:"\f0de";float:right;font-family:fontawesome}table.dataTable thead .sorting_desc:after{content:"\f0dd";float:right;font-family:fontawesome}table.dataTable thead .sorting:after{content:"\f0dc";float:right;font-family:fontawesome;color:rgba(50,50,50,.5)}
      .btn-circle{width:30px;height:30px;padding:6px 0;border-radius:15px;text-align:center;font-size:12px;line-height:1.428571429}.btn-circle.btn-lg{width:50px;height:50px;padding:10px 16px;border-radius:25px;font-size:18px;line-height:1.33}
      .btn-circle.btn-xl{width:70px;height:70px;padding:10px 16px;border-radius:35px;font-size:24px;line-height:1.33}.show-grid [class^=col-]{padding-top:10px;padding-bottom:10px;border:1px solid #ddd;background-color:#eee!important}.show-grid{margin:15px 0}.huge{font-size:40px}.panel-green{border-color:#5cb85c}
      .panel-green>.panel-heading{border-color:#5cb85c;color:#fff;background-color:#5cb85c}.panel-green>a{color:#5cb85c}.panel-green>a:hover{color:#3d8b3d}.panel-red{border-color:#d9534f}.panel-red>.panel-heading{border-color:#d9534f;color:#fff;background-color:#d9534f}
      .panel-red>a{color:#d9534f}.panel-red>a:hover{color:#b52b27}.panel-yellow{border-color:#f0ad4e}.panel-yellow>.panel-heading{border-color:#f0ad4e;color:#fff;background-color:#f0ad4e}.panel-yellow>a{color:#f0ad4e}.panel-yellow>a:hover{color:#df8a13}

  </style>
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
        <div id="page-content-wrapper">
            <div class="container-fluid">
              <br><br><br>
              <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-line-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="avgUsersForDay"></div>
                                    <div>ממוצע משתתפים יומי </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-lg-3 col-md-6">
                      <div class="panel panel-yellow">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <i class="fa fa-check-circle fa-5x"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge" id="ExpActive"></div>
                                      <div>ניסויים פעילים</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                      <div class="panel panel-green">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <i class="fa fa-users fa-5x"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge" id="usersNum"></div>
                                      <div>משתתפים</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                      <div class="panel panel-primary">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <i class="fa fa-comments fa-5x"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge" id="msg"></div>
                                      <div>הודעות</div>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
              <div class="row">

                  <div class="col-sm-4">
                    <br>
                    <div id="chart-3"></div>
                </div>
                <div class="col-sm-4">
                  <br>
                  <div id="chart-1"></div>
              </div>
              <div class="col-sm-3">
                <br>
                <div id="chart-2"></div>
            </div>

            </div>
<br>
                <table id="dataTbl" class="table table-hover table-bordered table-responsive">

                </table>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
</div>
<!-- /#wrapper -->

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

        $.getJSON('charts/getAllData.php', function(data) {
          var header="<thead><tr><th>מזהה משתמש</th><th>תאריך</th><th>שעת התחלה</th><th>שעת סיום</th>"+
                            "<th>מגדר</th><th>שנת לידה</th><th>תחום השכלה</th><th>מצב אקדמי</th><th>סוג תואר אקדמי</th>"+
                            "<th>מצב לימודים</th><th>תחום תפקיד</th><th>ותק</th><th>קבוצת מחקר</th><th>מספר ניסוי</th><th>קבוצת מדגם</th></tr></thead>";
              $('#dataTbl').append(header);
            $.each(data, function(index,value) {
                  var add = "";
                  add += "<tr>"
                  +"<td><b>"+value.ID+"</b></td>"
                  +"<td>"+value.Date+"</td>"
                  +"<td>"+value.StartTime+"</td>"
                  +"<td>"+value.EndTime+"</td>"
                  +"<td>"+value.Gender+"</td>"
                  +"<td>"+value.BirthYear+"</td>"
                  +"<td>"+value.Education+"</td>"
                  +"<td>"+value.AcademicStatus+"</td>"
                  +"<td>"+value.degreeType+"</td>"
                  +"<td>"+value.StudyStatus+"</td>"
                  +"<td>"+value.Role+"</td>"
                  +"<td>"+value.Experience+"</td>"
                  +"<td>"+value.ResearchGroup+"</td>"
                  +"<td>"+value.ExperimentNumber+"</td>"
                  +"<td>"+value.GroupType+"</td>"
                  +"</tr>";
                  $('#dataTbl').append(add);
                });
        });
        $.ajax({
            type: "GET",
            url: "../getDataToPages/getDataToMain.php",
            success: function(data){
          // data is a string that will return from the db
          // the string will contain all the fields for general page

          var parsed = JSON.parse(data); // get parsed JSON
          var arr = []; // empty array
          for(var x in parsed){
            arr.push(parsed[x]); // push every element to the array
          }
          $("#msg").append(arr[0]);
          $("#usersNum").append(arr[1]);
          $("#ExpActive").append(arr[2]);
          $("#avgUsersForDay").append(arr[3]);
        }
          });

    </script>

    </body>
</html>
<?php
include("charts/includes/fusioncharts.php");
include 'charts/chart1.php';
include 'charts/chart2.php';
include 'charts/chart3.php';

 ?>
