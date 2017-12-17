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
                        <h2>משחק</h2>
                        <hr class="style18">
                      </div>
                  </div>

                  <button class="btn btn-primary" onclick=" window.open('../game/game.php','_blank')">תצוגה מקדימה</button>

                  <form class="hebrew" method="post" action="savedata/saveDataGame.php" enctype="multipart/form-data" onsubmit="return validate()">
                    <div class="form-group">
                      <h3 class="hebrew">כותרת</h3>
                       <textarea type="text"class="  hebrew" id="headerGame" name="headerGame" placeholder="כותרת משחק"  rows="1" cols="66"></textarea><br>
                      <h3 class="hebrew">:מלל הסבר משחק</h3>
                      <textarea type="text"  id="explanationGame" name="explanationGame" placeholder="מלל הסבר משחק" rows="4" cols="66" class="explanationGame"></textarea><br>
                      <!-- <input type="text" class="  hebrew" id="explanationGame" name="explanationGame" placeholder="מלל הסבר משחק"><br> -->
                      <h3 class="hebrew">:תמונות משחק</h3>
                        <h3 class="hebrew">:תמונה 1</h3>
                      <div id="viewPictureGame1" name="viewPictureGame1">
                      </div>
                      <div class="inputfile">
                        <table>
                          <tr>
                            <td><input type='button' name="deletPic4" id="deletPic4" value="מחק" onclick="deletePic(4)"/></td>
                            <td><input type='file' onchange="readURL4(this);" name="uploadPic4" id="uploadPic4"/></td>
                          </tr>
                        </table>
                      </div>
                      <h3 class="hebrew">:תמונה 2</h3>
                      <div id="viewPictureGame2" name="viewPictureGame2">
                      </div>
                      <div class="inputfile">
                        <table>
                          <tr>
                            <td><input type='button' name="deletPic5" id="deletPic5" value="מחק" onclick="deletePic(5)"/></td>
                            <td><input type='file' onchange="readURL5(this);" name="uploadPic5" id="uploadPic5"/></td>
                          </tr>
                        </table>
                      </div>
                    </div>


                    <button type="submit" class="btn btn-primary">שמור  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

                 </form>
                 <!-- divsForTextArea -->
                 <div class="explanationGame" id="explanationGame1"></div>

        <!-- /#page-wrapper -->
    </div>
</div>
<!-- /#wrapper -->

        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <script type='text/javascript'>

        $(document).ready(function() {
          $("#explanationGame1").hide();
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
          var x=$("#explanationGame1").html();
          $("#explanationGame").val(x);

          return true;
          }

        $('.explanationGame:not(.focus)').keyup(function(){
            var value = $(this).val();
            var contentAttr = $(this).attr('name');
              $('.'+contentAttr+'').html(value.replace(/\r?\n/g,'<br/>'));
        })
    </script>

<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "../getDataToPages/getDataToGame.php",
        success: function(data){
      // data is a string that will return from the db
      // the string will contain all the fields for general page

      var parsed = JSON.parse(data); // get parsed JSON
      var arr = []; // empty array
      for(var x in parsed){
        arr.push(parsed[x]); // push every element to the array
      }

      document.getElementById("headerGame").value = arr[0];
      $("#explanationGame1").html(arr[1]);
      var updateTextArea1 = document.getElementById("explanationGame1").textContent;
      document.getElementById("explanationGame").value = updateTextArea1;
    //  document.getElementById("explanationGame").value = arr[1];
      // document.getElementById("gamePicture").value = ;
      $("#viewPictureGame1").append(arr[3]);
      $("#viewPictureGame2").append(arr[4]);
          }
      });


     });

     $(function() {
     $('input:text').keydown(function(e) {
     if(e.keyCode==87)
         return false;
     });
     });


     function readURL4(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
           reader.onload = function (e) {
               $('#picGame1')
                   .attr('src', e.target.result)
                   .height(80);
           };
           reader.readAsDataURL(input.files[0]);
       }
   }
   function readURL5(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
             $('#picGame2')
                 .attr('src', e.target.result)
                 .height(80);
         };
         reader.readAsDataURL(input.files[0]);
     }
 }
 function deletePic(picNum){
   $.ajax({
       type: "GET",
       url: "saveData/deletePicture.php",
       data: { 'picNum': picNum},
       success: function(data){
            location.reload();

         }
     });

}
</script>

    </body>
</html>
