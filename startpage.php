<?php
   header('Content-Type: text/html; charset=utf-8');
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
        <link rel="stylesheet" href="myStyle.css">
        <style media="screen">
        p{
          font-size: 2.5em;
          font-weight: bold;
          text-align: center;
        }
        .big{
          font-size: 3em;
        }
        #email{
          font-size: 3em;
          font-weight: bold;
          text-decoration: underline;
          color: blue;
        }
        </style>
    </head>
<body class="body">
  <div class="container1">
    <div class="col-sm-12">

    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
          <!-- <h1>ברוכים הבאים למחקר בקבלת החלטות</h1> -->
          <h1 id="header"></h1>
          </div>
        </div>
      </div>
    </header>

    <div class="loader" id="loader"></div>

<!-- <p class="hebrew" id="startpage">
המחקר מיועד לנשים וגברים<br>
והפניה בלשון זכר היא רק לשם פשטות<br>
השאלון אנונימי ומיועד לצרכי מחקר בלבד<br>
תודה על שיתוף הפעולה<br>
מייל צוות המחקר:<br>
studyHaifa@gmail.com
</p> -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10">
        <p class="hebrew" id="content"></p>
<h2 id="email"><address><a href="mailto:studyHaifa@gmail.com">studyHaifa@gmail.com</a></address></h2>
    </div>
    <div class="col-sm-1">
    </div>
  </div>
</div>
<br><br>

    <a href="information.html" id="next" class="big">התחל</a>

 <br><br><br>
</div>
    <br><br>
      </div>
  <br><br><br><br>
  </div>

    </body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $.ajax({
      type: "GET",
      url: "getDataToPages/getDataToStartPage.php",
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
      }
    });
    setTimeout(function(){
          $("#loader").hide();
          $("#myForm").show();
      }, 1000);
   });
</script>
