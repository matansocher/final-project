
<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['currentUser'])){
  header("Location: login/login.php");
}

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
 if(count($_POST)>0) {
 $result = $conn->query("SELECT * from user WHERE userName='" . $_SESSION["currentUser"] . "'");
  while($row = $result->fetch_assoc()){
 if($_POST["currentPassword"] == $row["password"]) {
 $conn->query("UPDATE user set password='" . $_POST["newPassword"] . "' WHERE userName='" . $_SESSION["currentUser"] . "'");
 $message = "true";
 } else $message = "false";
 }
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
        </head>
    </head>
<style media="screen">
  body{
    font-family: simpleFont;
  }
  .message{
    color: #f2f2f2;
  }
  #correctPassword{
    color: green;
        font-size: 20px;
  }
  #wrongPassword{
    color: red;
    font-size: 20px;
  }
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
              <div class="row">
                <br>
                <h2>פרופיל משתמש</h2>
                <br>
                <div class="col-xs-5">

                  </div>

                <div class="col-xs-5">
                  <h3><img src="images/user_lock.png" height="50px">שינוי סיסמא  </h3>
                <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                <div>
                <table border="0" cellpadding="10" cellspacing="0" align="center" class="tblSaveForm">
                <tr>
                <td width="60%"><span id="currentPassword"  class="required"></span><input type="password" name="currentPassword" class="txtField"/></td>
                <td width="20%"><label>:סיסמא נוכחית</label></td>
                </tr>
                <tr>
                <td><span id="newPassword" class="required"></span><input type="password" name="newPassword" class="txtField"/></td>
                <td><label>:סיסמא חדשה</label></td>

                </tr>
                <td><span id="confirmPassword" class="required"></span><input type="password" name="confirmPassword" class="txtField"/></td>
                <td><label>:אימות סיסמא</label></td>
                </tr>
                <tr>

                <td colspan="2"><br><button type="submit" name="submit" class="btn btn-primary">שמור  <i class="fa fa-floppy-o" aria-hidden="true"></i></button></td>
                </tr>
                </table>
                <br><br>
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div id="correctPassword"></div>
<div id="wrongPassword"></div>            </div>
                </form>
              </div>

            </div>

        </div>
        <!-- /#page-content-wrapper -->
    </div>
</div>
<!-- /#wrapper -->

    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
    <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
    <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>
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

              if($(".message").text()=="true"){
                $(".message").html(" ");
                  $("#correctPassword").append("הסיסמא שונתה בהצלחה<img src='images/vIcon.png' height=60px>");

                }
              if($(".message").text()=="false"){
                  $(".message").html(" ");
                  $("#wrongPassword").append("סיסמא נוכחית אינה תקינה<img src='images/xIcon.png' height=30px>");


                }
        });
    </script>
    </body>
  </html>
  <script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML=  "נדרש למלא שדה זה";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML =  "נדרש למלא שדה זה";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "נדרש למלא שדה זה";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "סיסמאות לא זהות";
	output = false;
}
return output;
}
</script>
