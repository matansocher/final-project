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
<style media="screen">
  table,td,tr,th {
    direction: rtl;
    text-align: center;
    background-color: #ffffff;
    width: 40%;
  border: 1px solid black;
  border-collapse: collapse;
  margin-left: 30%;
  }
  .expTitle{
    font-size: 20px;
      direction: rtl;
  }
  th{
    font-size: 23px;
    text-align: center;
    background-color: #b3c6ff;
  }
  .conterDiv{
    text-align: center;
  }
  button{
    margin-right : 50%;
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
        <div id="page-content-wrapper" text-align="center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-cm-12">
                      <br>
                        <h2><img src="images/settings.png" height="50px"> הגדרות ניסויים</h2>
                        <hr class="style18">
                      </div>
                  </div>

                  <form class="hebrew" method="post" action="savedata/saveDataGeneral.php" onsubmit="return validateForm()">
                    <div class="form-group">
                      <div class="container">
                        <div class="conterDiv">

                            <h3>:כמות משתתפים בכל ניסוי</h3>

                          <textarea type="text" class="d-inline hebrew" id="exp1counter" name="exp1counter" placeholder="counter" rows="1" cols="10"></textarea>

                        </div>
                      </div>



<table>
  <thead>
    <tr>
      <th  width=10%>מספר ניסוי</th>
      <th  width=10%>פעיל</th>
      <th  width=10%>סדר</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="expTitle">ניסוי 1:</td>
      <td><input type="checkbox" name="activeexp1" id="activeexp1"></td>

      <td class="inputForOrder"><textarea type="text" id="order1" name="order1" placeholder="order" rows="1" cols="4"></textarea><br></td>
    </tr>
    <tr>
      <td  class="expTitle">ניסוי 2:</td>
      <td><input type="checkbox" name="activeexp2" id="activeexp2"></td>
      <td class="inputForOrder"><textarea type="text" id="order2" name="order2" placeholder="order" rows="1" cols="4"></textarea><br></td>
    </tr>
    <tr>
      <td class="expTitle">ניסוי 3:</td>
      <td><input type="checkbox" name="activeexp3" id="activeexp3"></td>
      <td class="inputForOrder"><textarea type="text" id="order3" name="order3" placeholder="order" rows="1" cols="4"></textarea><br></td>
    </tr>
    <tr>
      <td class="expTitle">ניסוי 4:</td>
      <td><input type="checkbox" name="activeexp4" id="activeexp4"></td>
      <td class="inputForOrder"><textarea type="text" id="order4" name="order4" placeholder="order" rows="1" cols="4"></textarea><br></td>
    </tr>
    <tr>
      <td class="expTitle">ניסוי 5:</td>
      <td><input type="checkbox" name="activeexp5" id="activeexp5"></td>
      <td class="inputForOrder"><textarea type="text" id="order5" name="order5" placeholder="order" rows="1" cols="4"></textarea><br></td>


    </tr>
    <tr>
<td class="expTitle">ניסוי 6:</td>
<td><input type="checkbox" name="activeexp6" id="activeexp6"></td>
<td class="inputForOrder"><textarea type="text" id="order6" name="order6" placeholder="order" rows="1" cols="4"></textarea><br></td>

    </tr>
  </tbody>
</table>
</div>
  <button type="submit" class="btn btn-primary">שמור  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                   </form>
    </div>
</div>
  </body>
</html>
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

<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "../getDataToPages/getDataToGeneral.php",
        success: function(data){
      // data is a string that will return from the db
      // the string will contain all the fields for general page

      var parsed = JSON.parse(data); // get parsed JSON
      var arr = []; // empty array
      for(var x in parsed){
        arr.push(parsed[x]); // push every element to the array
      }

      document.getElementById("exp1counter").value = arr[1];

      if (arr[0] == 1){
        document.getElementById("activeexp1").checked = true;
        document.getElementById("order1").value = arr[2];
      }
      else {
        document.getElementById("order1").disabled = true;
        $('#order1').val("0");
      }

      if (arr[3] == 1){
        document.getElementById("activeexp2").checked = true;
        document.getElementById("order2").value = arr[5];
      }
      else {
        document.getElementById("order2").disabled = true;
        $('#order2').val("0");
      }

      if (arr[6] == 1){
        document.getElementById("activeexp3").checked = true;
        document.getElementById("order3").value = arr[8];
      }
      else {
        document.getElementById("order3").disabled = true;
        $('#order3').val("0");
      }

      if (arr[9] == 1){
        document.getElementById("activeexp4").checked = true;
        document.getElementById("order4").value = arr[11];
      }
      else {
        document.getElementById("order4").disabled = true;
        $('#order4').val("0");
      }

      if (arr[12] == 1){
        document.getElementById("activeexp5").checked = true;
        document.getElementById("order5").value = arr[14];
      }
      else {
        document.getElementById("order5").disabled = true;
        $('#order5').val("0");
      }

      if (arr[15] == 1){
        document.getElementById("activeexp6").checked = true;
        document.getElementById("order6").value = arr[17];
      }
      else {
        document.getElementById("order6").disabled = true;
        $('#order6').val("0");
      }

    }
      });
     });

    $('input[name=activeexp1]').change(function(){
    if($(this).is(':checked')){
      document.getElementById("order1").disabled = false;
    }
    else{
      document.getElementById("order1").disabled = true;
      $('#order1').val("0");
    }
    });

   $('input[name=activeexp2]').change(function(){
     if($(this).is(':checked')){
       document.getElementById("order2").disabled = false;
     }
     else{
       document.getElementById("order2").disabled = true;
       $('#order2').val("0");
     }
   });

   $('input[name=activeexp3]').change(function(){
     if($(this).is(':checked')){
       document.getElementById("order3").disabled = false;
     }
     else{
       document.getElementById("order3").disabled = true;
       $('#order3').val("0");
     }
  });

  $('input[name=activeexp4]').change(function(){
    if($(this).is(':checked')){
      document.getElementById("order4").disabled = false;
    }
    else{
      document.getElementById("order4").disabled = true;
      $('#order4').val("0");
    }
 });

  $('input[name=activeexp5]').change(function(){
    if($(this).is(':checked')){
      document.getElementById("order5").disabled = false;
    }
    else{
      document.getElementById("order5").disabled = true;
      $('#order5').val("0");
    }
  });

  $('input[name=activeexp6]').change(function(){
    if($(this).is(':checked')){
      document.getElementById("order6").disabled = false;
    }
    else{
      document.getElementById("order6").disabled = true;
      $('#order6').val("0");
    }
  });

  function validateForm() {

    if ((parseInt(document.getElementById("order1").value) === 0 && document.getElementById('activeexp1').checked) ||
      (parseInt(document.getElementById("order2").value) === 0 && document.getElementById('activeexp2').checked) ||
      (parseInt(document.getElementById("order3").value) === 0 && document.getElementById('activeexp3').checked) ||
      (parseInt(document.getElementById("order4").value) === 0 && document.getElementById('activeexp4').checked) ||
      (parseInt(document.getElementById("order5").value) === 0 && document.getElementById('activeexp5').checked) ||
      (parseInt(document.getElementById("order6").value) === 0 && document.getElementById('activeexp6').checked)
    ) {
      $("#myModal").modal("show");
      return false;
    }

    var orderOfExperiments = [];
    var arr = [];
    arr[0] = document.getElementById("order1").value;
    arr[1] = document.getElementById("order2").value;
    arr[2] = document.getElementById("order3").value;
    arr[3] = document.getElementById("order4").value;
    arr[4] = document.getElementById("order5").value;
    arr[5] = document.getElementById("order6").value;

    for (i = 0; i < arr.length; i++) {
      if (new String(arr[i]).valueOf() !== "0") {
        orderOfExperiments.push(arr[i]);
      }
    }

    orderOfExperiments.sort(compareNumbers);

    for (i = 1; i <= orderOfExperiments.length; i++) {
      if (parseInt(orderOfExperiments[i-1]) !== i) {
        $("#myModal").modal("show");
        return false;
      }
    }
    return true;//true
  }

  function compareNumbers(a, b) {
    return a - b;
  }

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
