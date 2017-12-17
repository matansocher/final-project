
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
                        <h2>משימת פרסומת</h2>
                        <hr class="style18">
                      </div>
                  </div>

                  <button class="btn btn-primary" onclick=" window.open('../questionnaireExperiment/advertismentRank.html','_blank')">תצוגה מקדימה - דירוג</button>
                  <button class="btn btn-primary" onclick=" window.open('../questionnaireExperiment/advertismentChoose.html','_blank')">תצוגה מקדימה - בחירה</button>

                  <form class="hebrew" method="post" action="savedata/saveDataAdvertisment.php" onsubmit="return validate()">
                    <div class="form-group">
                  <h3 class="hebrew">:כותרת משימת פרסומת</h3>
                  <textarea type="text" class="hebrew" id="header" name="header" placeholder="כותרת משימת פרסומת" rows="1" cols="66"></textarea><br>
                  <h3 class="hebrew">:מלל הסבר משימת פרסומת</h3>
                  <textarea type="text" class="description hebrew" id="description" name="description" placeholder="מלל הסבר משימת פרסומת" rows="4" cols="66"></textarea><br>
                  <h3 class="hebrew">:הודעת שגיאה</h3>
                  <textarea type="text" class="hebrew" id="errorMessage" name="errorMessage" placeholder="הודעת שגיאה" rows="1" cols="66"></textarea><br>
                  <h3 class="hebrew">:לבחירה - אפשרות 1</h3>
                  <textarea type="text" class="hebrew" id="option11" name="option11" placeholder="לבחירה - אפשרות 1" rows="1" cols="66"></textarea><br>
                  <h3 class="hebrew">:לבחירה - אפשרות 2</h3>
                  <textarea type="text" class="hebrew" id="option12" name="option12" placeholder="לבחירה - אפשרות 2"  rows="1" cols="66"></textarea><br>
                  <h3 class="hebrew">:לדירוג - אפשרות 1</h3>
                  <textarea type="text" class="hebrew" id="option21" name="option21" placeholder="לדירוג - אפשרות 1" rows="1" cols="66"></textarea><br>
                  <h3 class="hebrew">:לדירוג - אפשרות 2</h3>
                  <textarea type="text" class="hebrew" id="option22" name="option22" placeholder="לדירוג - אפשרות 2"  rows="1" cols="66"></textarea><br>
                  <h3 class="hebrew">:לדירוג - אפשרות 3</h3>
                  <textarea type="text" class="hebrew" id="option23" name="option23" placeholder="לדירוג - אפשרות 3" rows="1" cols="66"></textarea><br>
                  <h3 class="hebrew">:לדירוג - אפשרות 4</h3>
                  <textarea type="text" class="hebrew" id="option24" name="option24" placeholder="לדירוג - אפשרות 4" rows="1" cols="66"></textarea><br>
                  <h3 class="hebrew">:לדירוג - אפשרות 5</h3>
                  <textarea type="text" class="hebrew" id="option25" name="option25" placeholder="לדירוג - אפשרות 5" rows="1" cols="66"></textarea><br>
                </div>
                <button type="submit" class="btn btn-primary">שמור  <i class="fa fa-floppy-o" aria-hidden="true"></i></button>

               </form>
               <!-- divsForTextArea -->
               <div class="description" id="description1"></div>


        <!-- /#page-wrapper -->
    </div>
</div>
<!-- /#wrapper -->

        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type='text/javascript' src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <script type='text/javascript'>

        $(document).ready(function() {
          $("#description1").hide();

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

    $.ajax({
        type: "GET",
        url: "../getDataToPages/getDataToAdvertisment.php",
        success: function(data){
      // data is a string that will return from the db
      // the string will contain all the fields for general page

      var parsed = JSON.parse(data); // get parsed JSON
      var arr = []; // empty array
      for(var x in parsed){
        arr.push(parsed[x]); // push every element to the array
      }

      document.getElementById("header").value = arr[0];
      $("#description1").html(arr[1]);
      var updateTextArea1 = document.getElementById("description1").textContent;
      document.getElementById("description").value = updateTextArea1;
      document.getElementById("errorMessage").value = arr[2];
      document.getElementById("option11").value = arr[3];
      document.getElementById("option12").value = arr[4];
      document.getElementById("option21").value = arr[5];
      document.getElementById("option22").value = arr[6];
      document.getElementById("option23").value = arr[7];
      document.getElementById("option24").value = arr[8];
      document.getElementById("option25").value = arr[9];

      // document.getElementById("littleDescription").value = arr[14];
      // document.getElementById("option1").value = arr[15];
      // document.getElementById("option2").value = arr[16];
          }
      });

        });
        function validate() {
          var x=$("#description1").html();
          $("#description").val(x);
          return true;
          }

          $('.description:not(.focus)').keyup(function(){
              var value = $(this).val();
              var contentAttr = $(this).attr('name');
                $('.'+contentAttr+'').html(value.replace(/\r?\n/g,'<br/>'));
          })
    </script>

    </body>
</html>
