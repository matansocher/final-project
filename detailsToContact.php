<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Haifa Study</title>
        <link rel="stylesheet" href="myStyle.css">
        <style media="screen">
        p{
          font-size: 4em;
          font-weight: bold;
          text-align: center;
        }

        #cbname{
          width: 2em;
          height: 2em;
          font-weight: bold;
        }

        #toConfirm{
          font-size: 1.8em;
          position: relative;
          top:-8px;
        }

        </style>
    </head>
<body class="body">
<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 id="header"></h2>
      </div>
    </div>
  </div>
  </header>

  <div class="loader" id="loader"></div>

  <div class="container1">
    <div class="col-sm-12">
      <form class="hebrew" action="pageAfterDetailsToContact.php" method="post">
        <div class="form-group">
        <h2 id="content"></h2>
        <br>
        <div id="details" style="display: none;">
        <h3>מספר טלפון:</h3>
        <input type="text" id="phone" name="phone">
        <h3>כתובת מייל:</h3>
        <input type="text" id="mail" name="mail">
        </div>
        <br>
        <div class="submit">
            <input type="submit" name="button" id="next" value="שלח">
			   <br><br><br>
			  </div>
        </div>
      </form>
      </div>
  <br><br><br><br>
  </div>

    </body>
</html>
<script>
  $(document).ready(function(){

    $.ajax({
        type: "GET",
        url: "getDataToPages/getDataToDetailsToContact.php",
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
            $("#details").show();
            $("article").show();
        }, 1000);

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

window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="";}
</script>
