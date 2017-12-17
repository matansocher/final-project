
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
	    <form id="myForm" name="myForm" class="hebrew" action="panas2.php" method="post" onsubmit="return validateForm()">
        <div id="contentDiv" class="hebrew">
        </div>




        <div align="center">
        <h4 id="pageNumber"></h4>
			  <br>
        <h3 class="center" id="errorMessage" style="display: none"></h3>
        <br>
          <input type="submit" name="button" id="next" value="המשך">
        </div>
        </form>
      </div>
        <br><br><br><br><br><br> <br> <br><br><br> <br><br><br> <br><br>

</body>
</html>

<script type="text/javascript">

var arrayOfNumbersOfValidFeelings = [];

$(document).ready(function(){
$("article").hide();
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

    for (i = 0; i < 7; i++) {
      if (arr[i] !== "") {
        var actionName = getActionName(i+1);
        arrayOfNumbersOfValidFeelings.push(i+1);
        var add = "<h3><strong>" + arr[i] + ":</strong><label class='invalid' id='invalid" + (i+1) + "'></label></h3>";
        add += "<input type='radio' name='" + actionName + "' value='5'> " + arr[28] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='4'> " + arr[27] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='3'> " + arr[26] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='2'> " + arr[25] + "<br>";
        add += "<input type='radio' name='" + actionName + "' value='1'> " + arr[24] + "<br><hr>";
        $("#contentDiv").append(add);
      }
    }

    $("#pageNumber").append("<strong>עמוד 1 מתוך 3</strong>");

      }
    });
    setTimeout(function(){
          $("#loader").hide();
          $("article").show();
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

// for (i=0;i<array.length;i++) {
//   var select+array[i] = false;
// }
var selectMitanien=false;
var selectMutrad=false;
var selectNirgash=false;
var selectMezuvrah=false;
var selectHazak=false;
var selectMerugaz=false;
var selectDaruch=false;

function validateForm() {
  var mitanien = document.getElementsByName("mitanien");
  var mutrad = document.getElementsByName("mutrad");
  var nirgash = document.getElementsByName("nirgash");
  var mezuvrah = document.getElementsByName("mezuvrah");
  var hazak = document.getElementsByName("hazak");
  var merugaz = document.getElementsByName("merugaz");
  var daruch = document.getElementsByName("daruch");

  for(var i = 0; i < mitanien.length; i++) {
    if(mitanien[i].checked == true) {
     selectMitanien = true;
     }
    }
    if(selectMitanien == false){
    $("#invalid1").empty();
    $("#invalid1").append("*");
  }else
      $("#invalid1").empty();

  for(var i = 0; i < mutrad.length; i++) {
    if(mutrad[i].checked == true) {
     selectMutrad = true;
     }
    }
    if(selectMutrad == false){
    $("#invalid2").empty();
    $("#invalid2").append("*");
  }else
      $("#invalid2").empty();

  for(var i = 0; i < nirgash.length; i++) {
    if(nirgash[i].checked == true) {
     selectNirgash = true;
     }
    }
    if(selectNirgash == false){
      $("#invalid3").empty();
    $("#invalid3").append("*");
  }else
      $("#invalid3").empty();

  for(var i = 0; i < mezuvrah.length; i++) {
    if(mezuvrah[i].checked == true) {
     selectMezuvrah = true;
     }
    }
    if(selectMezuvrah == false){
      $("#invalid4").empty();
    $("#invalid4").append("*");
  }else
      $("#invalid4").empty();

  for(var i = 0; i < hazak.length; i++) {
    if(hazak[i].checked == true) {
     selectHazak = true;
     }
    }
    if(selectHazak == false){
      $("#invalid5").empty();
    $("#invalid5").append("*");
  }else
      $("#invalid5").empty();

  for(var i = 0; i < merugaz.length; i++) {
    if(merugaz[i].checked == true) {
     selectMerugaz = true;
     }
    }
    if(selectMerugaz == false){
    $("#invalid6").empty();
    $("#invalid6").append("*");
  }else
      $("#invalid6").empty();

  for(var i = 0; i < daruch.length; i++) {
    if(daruch[i].checked == true) {
     selectDaruch = true;
     }
    }
    if(selectDaruch == false){
    $("#invalid7").empty();
    $("#invalid7").append("*");
  }else
      $("#invalid7").empty();

//$("#aaaa").append("second line " + arrayOfNumbersOfValidFeelings);

if((selectMitanien==false && arrayOfNumbersOfValidFeelings.includes(1)) || (selectMutrad==false && arrayOfNumbersOfValidFeelings.includes(2)) ||
  (selectNirgash==false && arrayOfNumbersOfValidFeelings.includes(3)) || (selectMezuvrah==false && arrayOfNumbersOfValidFeelings.includes(4)) ||
  (selectHazak==false && arrayOfNumbersOfValidFeelings.includes(5)) || (selectMerugaz==false && arrayOfNumbersOfValidFeelings.includes(6)) ||
  (selectDaruch==false && arrayOfNumbersOfValidFeelings.includes(7))){

    $("#errorMessage").show();
    $("#invalid1").append("");
    $("#invalid2").append("");
    $("#invalid3").append("");
    $("#invalid4").append("");
    $("#invalid5").append("");
    $("#invalid6").append("");
    $("#invalid7").append("");
  return false
}
else
  return true; // true
}


  window.location.hash="no-back-button";
  window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
  window.onhashchange=function(){window.location.hash="";}


</script>
