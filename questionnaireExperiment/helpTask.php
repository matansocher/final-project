
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
  <link rel='stylesheet' type='text/css' href='../myStyle.css'/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="moneyPrimingJS.js"></script>
<title>Haifa Study</title>
</head>

<body class="body">

<header>
    <div class="container">
	<div class="row">
		<div class="col-sm-12">
      <h1 id="header">תרומה</h1>
		</div>

	</div>
	</div>
</header>

<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <div align="center">
        <h4 id="description">
          טקסט שנקבל
      </h4>

משימת עזרה
<br><br><br>
</div>
</div>
</div>

  </div>
</div>

<script>

$(document).ready(function(){
  $.ajax({
      type: "GET",
      url: "../getDataToPages/getDataToHelpTask.php",
      success: function(data){
    // data is a string that will return from the db
    // the string will contain all the fields for general page

    var parsed = JSON.parse(data); // get parsed JSON
    var arr = []; // empty array
    for(var x in parsed){
      arr.push(parsed[x]); // push every element to the array
    }

    document.getElementById("headerText").value = arr[0];
    document.getElementById("explanationText").value = arr[1];
    document.getElementById("feeling1").value = arr[2];
    document.getElementById("feeling2").value = arr[3];
    document.getElementById("feeling3").value = arr[4];
    document.getElementById("feeling4").value = arr[5];
    document.getElementById("feeling5").value = arr[6];
    document.getElementById("feeling6").value = arr[7];
    document.getElementById("feeling7").value = arr[8];
    document.getElementById("feeling8").value = arr[9];
    document.getElementById("feeling9").value = arr[10];
    document.getElementById("feeling10").value = arr[11];
    document.getElementById("feeling11").value = arr[12];

        }
    });
   });

// set the texts from php with ajax

window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="";}

</script>


</body>
</html>
