
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
		    <form id="myForm" name="myForm" class="hebrew" action="panas3.php" method="post" onsubmit="return validateForm()">
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

  $("#picture1").hide();
  $("#picture2").hide();
  $("#picture3").hide();

  $("table").fixMe();
  $(".up").click(function() {
     $('html, body').animate({
     scrollTop: 0
  }, 2000);
  });

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

    for (i = 7; i < 14; i++) {
      if (arr[i] !== "") {
        var actionName = getActionName(i+1);
        arrayOfNumbersOfValidFeelings.push(i+1-7);
        var add = "<h3><strong>" + arr[i] + ":</strong><label class='invalid' id='invalid" + (i+1) + "'></label></h3>";
        add += "<input type='radio' name='" + actionName + "' value='5'> " + arr[28] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='4'> " + arr[27] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='3'> " + arr[26] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='2'> " + arr[25] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='1'> " + arr[24] + "<br><hr>";
        $("#contentDiv").append(add);
      }
    }

    $("#pageNumber").append("<strong>עמוד 2 מתוך 3</strong>");

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

var selectMevuiash=false;
var selectBaalHashraa=false;
var selectAzbani=false;
var selectAshma=false;
var selectMefohad=false;
var selectOyen=false;
var selectPail=false;

function validateForm() {
  var mevuiash= document.getElementsByName("mevuiash");
  var baalHashraa= document.getElementsByName("baalHashraa");
  var azbani= document.getElementsByName("azbani");
  var ashma= document.getElementsByName("ashma");
  var mefohad= document.getElementsByName("mefohad");
  var oyen= document.getElementsByName("oyen");
  var pail= document.getElementsByName("pail");

  for(var i = 0; i < mevuiash.length; i++) {
    if(mevuiash[i].checked == true) {
     selectMevuiash = true;
     }
    }
    if(selectMevuiash == false){
    $("#invalid8").empty();
    $("#invalid8").append("*");
  }else
      $("#invalid8").empty();

  for(var i = 0; i < baalHashraa.length; i++) {
    if(baalHashraa[i].checked == true) {
     selectBaalHashraa = true;
     }
    }
    if(selectBaalHashraa == false){
    $("#invalid9").empty();
    $("#invalid9").append("*");
  }else
      $("#invalid9").empty();

  for(var i = 0; i < azbani.length; i++) {
    if(azbani[i].checked == true) {
     selectAzbani = true;
     }
    }
    if(selectAzbani == false){
    $("#invalid10").empty();
    $("#invalid10").append("*");
  }else
      $("#invalid10").empty();
  for(var i = 0; i < ashma.length; i++) {
    if(ashma[i].checked == true) {
     selectAshma = true;
     }
    }
    if(selectAshma == false){
      $("#invalid11").empty();
    $("#invalid11").append("*");
  }else
      $("#invalid11").empty();
  for(var i = 0; i < mefohad.length; i++) {
    if(mefohad[i].checked == true) {
     selectMefohad = true;
     }
    }
    if(selectMefohad == false){
    $("#invalid12").empty();
    $("#invalid12").append("*");
  }else
      $("#invalid12").empty();
  for(var i = 0; i < oyen.length; i++) {
    if(oyen[i].checked == true) {
     selectOyen = true;
     }
    }
    if(selectOyen == false){
    $("#invalid13").empty();
    $("#invalid13").append("*");
  }else
      $("#invalid13").empty();
  for(var i = 0; i < pail.length; i++) {
    if(pail[i].checked == true) {
     selectPail = true;
     }
    }
    if(selectPail == false){
    $("#invalid14").empty();
    $("#invalid14").append("*");
  }else
      $("#invalid14").empty


if((selectMevuiash==false && arrayOfNumbersOfValidFeelings.includes(1)) || (selectBaalHashraa==false && arrayOfNumbersOfValidFeelings.includes(2)) ||
  (selectAzbani==false && arrayOfNumbersOfValidFeelings.includes(3)) || (selectAshma==false && arrayOfNumbersOfValidFeelings.includes(4)) ||
  (selectMefohad==false && arrayOfNumbersOfValidFeelings.includes(5)) || (selectOyen==false && arrayOfNumbersOfValidFeelings.includes(6)) ||
  (selectPail==false && arrayOfNumbersOfValidFeelings.includes(7))){

    $("#errorMessage").show();
    $("#invalid8").append("");
    $("#invalid9").append("");
    $("#invalid10").append("");
    $("#invalid11").append("");
    $("#invalid12").append("");
    $("#invalid13").append("");
    $("#invalid14").append("");
  return false
}
else
  return true;
  }


  window.location.hash="no-back-button";
  window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
  window.onhashchange=function(){window.location.hash="";}


</script>
