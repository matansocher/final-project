
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
  <link rel='stylesheet' type='text/css' href='../myStyle.css'/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Haifa Study</title>
</head>

<body class="body">

<header>
    <div class="container">
	<div class="row">
		<div class="col-sm-12">
      <h1 id="header"></h1>
		</div>

	</div>
	</div>
</header>

<div class="loader" id="loader"></div>

<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <div align="center">
        <h3 id="description">
      </h3>
      <br><br>
      <h2 id="text" class="hebrew"></h2>
      <br><br><br>
      <form class="hebrew" action="../panas1.php" method="post">
        <input type="submit" name="button" id="next" value="המשך">
      </form>
      <br><br>
</div>
</div>
</div>

  </div>
</div>

<script>

$(document).ready(function(){
  $.ajax({
      type: "GET",
      url: "../getDataToPages/getDataToText.php",
      success: function(data){
    // data is a string that will return from the db
    // the string will contain all the fields for general page

    var parsed = JSON.parse(data); // get parsed JSON
    var arr = []; // empty array
    for(var x in parsed){
      arr.push(parsed[x]); // push every element to the array
    }

    $("#header").append(arr[2]);
    $("#description").append(arr[3]);
    $("#text").append(arr[0]);
    // $("#text2").append(arr[1]);
    // $("#errorMessage").append(arr[4]);

        }
    });
    setTimeout(function(){
          $("#loader").hide();
          $("article").show();
      }, 1000);
   });

// set the texts from php with ajax

window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="";}

</script>


</body>
</html>
