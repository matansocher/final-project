
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
  <link rel='stylesheet' type='text/css' href='myStyle.css'/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
td,th,thead {
    text-align: center;
}
.submit {
  text-align: center;
  font-size: 2em;
}
#picFixed{
  position: fixed;
  bottom : 0;
  right : 0;
  width: 100%;
  z-index:1;
}

</style>
<title>Haifa Study</title>
</head>

<body class="body">

  <div id="picture1" style="display: none">
      <img src="questionnaireExperiment/Pic1Sea.jpg" id="picFixed">
  </div>
  <div id="picture3" style="display: none">
      <img src="questionnaireExperiment/Pic3Money.jpg" id="picFixed">
  </div>

<header>

    <div class="container">
	<div class="row">
		<div class="col-sm-12">
      <h1 id="header"></h1>
			  <!-- <h1>שאלון</h1> -->

		</div>
	</div>
	</div>
</header>

<div class="loader" id="loader"></div>

<div class="container1">
		<div class="row">
			<div class="col-sm-12">
        <div align="center">
          <!-- <h4>
          להלן מספר תיאורים של רגשות שונים<br>
          .קרא כל תיאור וסמן לצידו את הספרה המתאימה לתיאור הרגשתך ברגע זה
        </h4> -->
        <h2 id="content" class="hebrew">
      </div>
    </div>
  </div>
</div>

  <br>
  <article class="container">
    <div class="formBox">
		    <form id="myForm" name="myForm" class="hebrew" action="pageAfterPanas.php" method="post" onsubmit="return validateForm()">
          <div id="contentDiv" class="hebrew">
          </div>

          <!-- from panas1 -->
          <input type="hidden" name="mitanien" value="<?php if(isset($_POST['mitanien'])){echo $_POST['mitanien'];}else {echo "null";} ?>">
          <input type="hidden" name="mutrad" value="<?php if(isset($_POST['mutrad'])){echo $_POST['mutrad'];}else {echo "null";} ?>">
          <input type="hidden" name="nirgash" value="<?php if(isset($_POST['nirgash'])){echo $_POST['nirgash'];}else {echo "null";} ?>">
          <input type="hidden" name="mezuvrah" value="<?php if(isset($_POST['mezuvrah'])){echo $_POST['mezuvrah'];}else {echo "null";} ?>">
          <input type="hidden" name="hazak" value="<?php if(isset($_POST['hazak'])){echo $_POST['hazak'];}else {echo "null";} ?>">
          <input type="hidden" name="merugaz" value="<?php if(isset($_POST['merugaz'])){echo $_POST['merugaz'];}else {echo "null";} ?>">
          <input type="hidden" name="daruch" value="<?php if(isset($_POST['daruch'])){echo $_POST['daruch'];}else {echo "null";} ?>">
          <!-- from panas2 -->
          <input type="hidden" name="mevuiash" value="<?php if(isset($_POST['mevuiash'])){echo $_POST['mevuiash'];}else {echo "null";} ?>">
          <input type="hidden" name="baalHashraa" value="<?php if(isset($_POST['baalHashraa'])){echo $_POST['baalHashraa'];}else {echo "null";} ?>">
          <input type="hidden" name="azbani" value="<?php if(isset($_POST['azbani'])){echo $_POST['azbani'];}else {echo "null";} ?>">
          <input type="hidden" name="ashma" value="<?php if(isset($_POST['ashma'])){echo $_POST['ashma'];}else {echo "null";} ?>">
          <input type="hidden" name="mefohad" value="<?php if(isset($_POST['mefohad'])){echo $_POST['mefohad'];}else {echo "null";} ?>">
          <input type="hidden" name="oyen" value="<?php if(isset($_POST['oyen'])){echo $_POST['oyen'];}else {echo "null";} ?>">
          <input type="hidden" name="pail" value="<?php if(isset($_POST['pail'])){echo $_POST['pail'];}else {echo "null";} ?>">

          <div align="center">
          <h4 id="pageNumber"></h4>
          <br>
          <h3 class="center" id="errorMessage" style="display: none"></h3>
          <br>
            <input type="submit" name="button" id="next" value="המשך">
          </div>

          </form>
          </div>
          <br><br><br><br><br><br> <br> <br><br> <br><br><br> <br><br>

</body>
</html>

<script type="text/javascript">

var arrayOfNumbersOfValidFeelings = [];

$(document).ready(function(){

  $("table").fixMe();
  $(".up").click(function() {
     $('html, body').animate({
     scrollTop: 0
  }, 2000);
});

$("#picture1").hide();
$("#picture2").hide();
$("#picture3").hide();
$.ajax({
    type: "GET",
    url: "questionnaireExperiment/showPicture.php",
    success: function(data){
        if(data==4 || data==7 )
            $("#picture1").show();
         if(data==5 || data==8 )
            $("#picture2").show();
            if(data==3 || data==6 )
             $("#picture3").show();
       }
    });

  $.ajax({
      type: "GET",
      url: "getDataToPages/getDataToPanas.php",
      success: function(data){
    // data is a string that will return from the db
    // the string will contain all the fields for general page

    var parsed = JSON.parse(data); // get parsed JSON
    var arr = []; // empty array
    for(var x in parsed){
      arr.push(parsed[x]); // push every element to the array
    }

    $("#header").append(arr[20]);
    $("#content").append(arr[21]);
    $("#errorMessage").append(arr[22]);

    for (i = 14; i < 20; i++) {
      if (arr[i] !== "") {
        var actionName = getActionName(i+1);
        arrayOfNumbersOfValidFeelings.push(i+1-14);
        var add = "<h3><strong>" + arr[i] + ":</strong><label class='invalid' id='invalid" + (i+1) + "'></label></h3>";
        add += "<input type='radio' name='" + actionName + "' value='5'> " + arr[28] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='4'> " + arr[27] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='3'> " + arr[26] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='2'> " + arr[25] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='1'> " + arr[24] + "<br><hr>";
        $("#contentDiv").append(add);
      }
    }

    $("#pageNumber").append("<strong>עמוד 3 מתוך 3</strong>");

      }
    });
    setTimeout(function(){
          $("#loader").hide();
          $("#myForm").show();
      }, 1000);
   });

   function getActionName(i) {
     var current;
     switch(i) {
         case 1:
             current = "mitanien";
             break;
         case 2:
             current = "mutrad";
             break;
         case 3:
             current = "nirgash";
             break;
         case 4:
             current = "mezuvrah";
             break;
         case 5:
             current = "hazak";
             break;
         case 6:
             current = "merugaz";
             break;
         case 7:
             current = "daruch";
             break;
         case 8:
             current = "mevuiash";
             break;
         case 9:
             current = "baalHashraa";
             break;
         case 10:
             current = "azbani";
             break;
         case 11:
             current = "ashma";
             break;
         case 12:
             current = "mefohad";
             break;
         case 13:
             current = "oyen";
             break;
         case 14:
             current = "pail";
             break;
         case 15:
             current = "gee";
             break;
         case 16:
             current = "hoshesh";
             break;
         case 17:
             current = "nahush";
             break;
         case 18:
             current = "kashuv";
             break;
         case 19:
             current = "hasarMenuha";
             break;
         case 20:
             current = "nilhav";
             break;
         default:
             break;
     }
     return current;
   }

;(function($) {
   $.fn.fixMe = function() {
      return this.each(function() {
         var $this = $(this),
            $t_fixed;
         function init() {
            $this.wrap('<div class="container" />');
            $t_fixed = $this.clone();
            $t_fixed.find("tbody").remove().end().addClass("fixed").insertBefore($this);
            resizeFixed();
         }
         function resizeFixed() {
            $t_fixed.find("th").each(function(index) {
               $(this).css("width",$this.find("th").eq(index).outerWidth()+"px");
            });
         }
         function scrollFixed() {
            var offset = $(this).scrollTop(),
            tableOffsetTop = $this.offset().top,
            tableOffsetBottom = tableOffsetTop + $this.height() - $this.find("thead").height();
            if(offset < tableOffsetTop || offset > tableOffsetBottom)
               $t_fixed.hide();
            else if(offset >= tableOffsetTop && offset <= tableOffsetBottom && $t_fixed.is(":hidden"))
               $t_fixed.show();
         }
         $(window).resize(resizeFixed);
         $(window).scroll(scrollFixed);
         init();
      });
   };
})(jQuery);

var selectGee=false;
var selectHoshesh=false;
var selectNahush=false;
var selectKashuv=false;
var selectHasarMenuha=false;
var selectNilhav=false;

function validateForm() {
  var gee= document.getElementsByName("gee");
  var hoshesh= document.getElementsByName("hoshesh");
  var nahush= document.getElementsByName("nahush");
  var kashuv= document.getElementsByName("kashuv");
  var hasarMenuha= document.getElementsByName("hasarMenuha");
  var nilhav= document.getElementsByName("nilhav");

  for(var i = 0; i < gee.length; i++) {
    if(gee[i].checked == true) {
     selectGee = true;
     }
    }
    if(selectGee == false){
      $("#invalid15").empty();
    $("#invalid15").append("*");
  }else
      $("#invalid15").empty();
  for(var i = 0; i < hoshesh.length; i++) {
    if(hoshesh[i].checked == true) {
     selectHoshesh = true;
     }
    }
    if(selectHoshesh == false){
      $("#invalid16").empty();
    $("#invalid16").append("*");
  }else
      $("#invalid16").empty();
  for(var i = 0; i < nahush.length; i++) {
    if(nahush[i].checked == true) {
     selectNahush = true;
     }
    }
    if(selectNahush == false){
    $("#invalid17").empty();
    $("#invalid17").append("*");
  }else
      $("#invalid17").empty();

  for(var i = 0; i < kashuv.length; i++) {
    if(kashuv[i].checked == true) {
     selectKashuv = true;
     }
    }
    if(selectKashuv == false){
    $("#invalid18").empty();
    $("#invalid18").append("*");
  }else
      $("#invalid18").empty();
  for(var i = 0; i < hasarMenuha.length; i++) {
    if(hasarMenuha[i].checked == true) {
     selectHasarMenuha = true;
     }
    }
    if(selectHasarMenuha == false){
    $("#invalid19").empty();
    $("#invalid19").append("*");
  }else
      $("#invalid19").empty();
  for(var i = 0; i < nilhav.length; i++) {
    if(nilhav[i].checked == true) {
     selectNilhav = true;
     }
    }
    if(selectNilhav == false){
      $("#invalid20").empty();
    $("#invalid20").append("*");
  }
  else
      $("#invalid20").empty();



if((selectGee==false && arrayOfNumbersOfValidFeelings.includes(1)) || (selectHoshesh==false && arrayOfNumbersOfValidFeelings.includes(2)) ||
  (selectNahush==false && arrayOfNumbersOfValidFeelings.includes(3)) || (selectKashuv==false && arrayOfNumbersOfValidFeelings.includes(4)) ||
  (selectHasarMenuha==false && arrayOfNumbersOfValidFeelings.includes(5)) || (selectNilhav==false && arrayOfNumbersOfValidFeelings.includes(6))){

    $("#errorMessage").show();
    $("#invalid15").append("");
    $("#invalid16").append("");
    $("#invalid17").append("");
    $("#invalid18").append("");
    $("#invalid19").append("");
    $("#invalid20").append("");
  return false
}
else
  return true;
  }


  window.location.hash="no-back-button";
  window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
  window.onhashchange=function(){window.location.hash="";}


</script>
