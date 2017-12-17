<?php
  $date = new DateTime();
  $startTime = $date->getTimestamp();
 ?>
<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Haifa Study</title>
        <link rel="stylesheet" href="../myStyle.css">
        <style media="screen">
          .left{
            margin-left: 75%;
          }

          .buttonn{
            background: transparent;
            border: none;
            color: transparent;
          }
          .buttonn:hover {
            cursor: auto;
          }
          #nextButton{
            background-color:#003d99;
            font-weight: bold;
            font-size: 2em;
            padding: 5px;
            border-radius: 1px;
            color: white;
            text-align: center;
            border: 2px solid white;
            box-shadow: 4px 4px 4px #888;
            border-radius: 10%;
          }
        </style>
    </head>
<body class="body">

<header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
      <h2 id="header"></h2>
      </div>
    </div>
  </div>
</header>

<div class="loader" id="loader"></div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">

      <h3 id="content" class="center hebrew"></h3>
      <br>

      <form class="center" action="pageAfterGame.php" onsubmit="assign()" method="post">
        <input type="hidden" name="start" value="<?php echo $startTime ?>">
        <input type="hidden" name="ifFound" id="ifFound" value=0>
        <input type="hidden" name="numOfSwitches" id="numOfSwitches" value=0>

      <input type="submit" name="button" class="center" id="help" value="עזרה">
      <br>

      <div id="success" style="display: none">
        <h1><span id="errorMessage"></span></h1>
        <br>
        <input type="submit" id="nextButton" class="btn btn-default" name="nextPage" value="המשך">
      </div>

        <h3 id="pictureTitle" class="center">'תמונה א</h3>

        <div class="picture1" class="center" id="picture1">
          <div class="waldo1 buttonn" onclick="found()"></div>
        </div>

        <div class="picture2" class="center" id="picture2">
          <div class="waldo2 buttonn" onclick="found()"></div>
        </div>

      </form>
    </div>
  </div>
</div>
<br>
<div class="center">
  <button type="button" id="next" onclick="replacePictures()">'עבור לתמונה ב</button>
<!-- class="glyphicon glyphicon-arrow-left" -->
  <!-- <button type="button" class="glyphicon glyphicon-arrow-right" onclick="replacePictures()"></button> -->
</div>

<br>


<br><br><br><br>

    </body>
</html>
<script>

$(document).ready(function(){

  $("#picture2").hide();

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

    $("#header").append(arr[0]);
    $("#content").append(arr[1]);
    $("#errorMessage").append(arr[2]);
      }
    });
    setTimeout(function(){
          $("#loader").hide();
          $("#myForm").show();
      }, 5000);
   });

   var numberOfSwitches = 0;

   function replacePictures() {
     if ($("#picture2").is(":visible")) {
       $("#picture2").hide();
      sleep().then(() => {
        $("#picture1").show();
        $('#next').text('עבור לתמונה ב').button("refresh");
        $("#pictureTitle").empty();
        $("#pictureTitle").append("תמונה א");
      });
     }
     else {
       $("#picture1").hide();
      sleep().then(() => {
        $("#picture2").show();
        $('#next').text('עבור לתמונה א').button("refresh");
        $("#pictureTitle").empty();
        $("#pictureTitle").append("'תמונה ב");
      });
     }
     numberOfSwitches++;
   }

   function sleep () {
     return new Promise((resolve) => setTimeout(resolve, 100));
   }

   function found () {
     document.getElementById("ifFound").value = 1;
     document.getElementById("numOfSwitches").value = numberOfSwitches;
    //  $("#myModal").modal("show");
     $("#success").show();
   }

   function assign () {
     document.getElementById("numOfSwitches").value = numberOfSwitches;
     return true;
   }

window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="";}
</script>
