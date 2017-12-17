
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
<style media="screen">
td,th,thead {
  text-align: center;
}
</style>
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

<div class="container1">
		<div class="row">
			<div class="col-sm-12">
        <div align="center">
          <h2 id="description" class="hebrew"></h2>
      </div>
    </div>
  </div>
</div>

        <br>
  <article class="container">
    <div class="formBox">
      <form class="hebrew" action="pageAfterFeeling.php" method="post"  onsubmit="return validateForm()">
        <div id="contentDiv" class="hebrew">
        </div>

        <!-- from feeling 1 -->
        <input type="hidden" name="a" value="<?php if(isset($_POST['a'])){echo $_POST['a'];}else {echo "null";} ?>">
        <input type="hidden" name="b" value="<?php if(isset($_POST['b'])){echo $_POST['b'];}else {echo "null";} ?>">
        <input type="hidden" name="c" value="<?php if(isset($_POST['c'])){echo $_POST['c'];}else {echo "null";} ?>">
        <input type="hidden" name="d" value="<?php if(isset($_POST['d'])){echo $_POST['d'];}else {echo "null";} ?>">
        <input type="hidden" name="e" value="<?php if(isset($_POST['e'])){echo $_POST['e'];}else {echo "null";} ?>">
        <input type="hidden" name="f" value="<?php if(isset($_POST['f'])){echo $_POST['f'];}else {echo "null";} ?>">
        <div align="center">
        <h4 id="pageNumber"></h4>
        <br>
        <h3 class="center" id="errorMessage" style="display: none"></h3>
        <br>
          <input type="submit" name="button" id="next" value="המשך">
        </div>
      </form>
    </div>

      <br><br><br>

<script>

var arrayOfNumbersOfValidFeelings = [];

$(document).ready(function(){
  $.ajax({
      type: "GET",
      url: "../getDataToPages/getDataToFeelings.php",
      success: function(data){
    // data is a string that will return from the db
    // the string will contain all the fields for general page

    var parsed = JSON.parse(data); // get parsed JSON
    var arr = []; // empty array
    for(var x in parsed){
      arr.push(parsed[x]); // push every element to the array
    }

    $("#header").append(arr[0]);
    $("#description").append(arr[1]);
    $("#errorMessage").append(arr[2]);

    for (i = 0; i < 5; i++) {
      if (arr[i] !== "") {
        var actionName = getActionName(i+7);
        arrayOfNumbersOfValidFeelings.push(i+1);
        var add = "<h3><strong>" + arr[i+9] + ":</strong><label class='invalid' id='invalid" + (i+7) + "'></label></h3>";
        add += "<input type='radio' name='" + (actionName) + "'value='5'> " + arr[19] + "<br>";
        add += "<input type='radio' name='" + (actionName) + "'value='4'> " + arr[18] + "<br>";
        add += "<input type='radio' name='" + (actionName) + "'value='3'> " + arr[17] + "<br>";
        add += "<input type='radio' name='" + (actionName) + "'value='2'> " + arr[16] + "<br>";
        add += "<input type='radio' name='" + (actionName) + "'value='1'> " + arr[15] + "<br><hr>";
        $("#contentDiv").append(add);
      }
    }

    $("#pageNumber").append("<strong>עמוד 2 מתוך 2</strong>");

        }
    });
   });
   setTimeout(function(){
         $("#loader").hide();
         $("#myForm").show();
     }, 1000);

   function getActionName(i) {
     var current;
     switch(i) {
         case 1:
             current = "a";
             break;
         case 2:
             current = "b";
             break;
         case 3:
             current = "c";
             break;
         case 4:
             current = "d";
             break;
         case 5:
             current = "e";
             break;
         case 6:
             current = "f";
             break;
         case 7:
             current = "g";
             break;
         case 8:
             current = "h";
             break;
         case 9:
             current = "i";
             break;
         case 10:
             current = "j";
             break;
         case 11:
             current = "k";
             break;
         default:
             break;
     }
     return current;
   }

   var selectG=false;
   var selectH=false;
   var selectI=false;
   var selectJ=false;
   var selectK=false;

   function validateForm() {

     var radioButtonG = document.getElementsByName("g");
     var radioButtonH = document.getElementsByName("h");
     var radioButtonI = document.getElementsByName("i");
     var radioButtonJ = document.getElementsByName("j");
     var radioButtonK = document.getElementsByName("k");


       for(var i = 0; i < radioButtonG.length; i++) {
             if(radioButtonG[i].checked == true) {
                selectG = true;
                }
               }
               if(selectG == false){
               $("#invalid7").empty();
               $("#invalid7").append("*");
             }else
                 $("#invalid7").empty();

       for(var i = 0; i < radioButtonH.length; i++) {
             if(radioButtonH[i].checked == true) {
                selectH = true;
                }
               }
               if(selectH == false){
               $("#invalid8").empty();
               $("#invalid8").append("*");
             }else
                 $("#invalid8").empty();

       for(var i = 0; i < radioButtonI.length; i++) {
             if(radioButtonI[i].checked == true) {
                selectI = true;
                }
               }
               if(selectI == false){
               $("#invalid9").empty();
               $("#invalid9").append("*");
             }else
                 $("#invalid9").empty();

       for(var i = 0; i < radioButtonJ.length; i++) {
             if(radioButtonJ[i].checked == true) {
                  selectJ = true;
                    }
                   }
                 if(selectJ == false){
                 $("#invalid10").empty();
                   $("#invalid10").append("*");
                       }else
                         $("#invalid10").empty();


       for(var i = 0; i < radioButtonK.length; i++) {
             if(radioButtonK[i].checked == true) {
                  selectK = true;
                    }
                   }
                 if(selectK == false){
                 $("#invalid11").empty();
                   $("#invalid11").append("*");
                       }else
                       $("#invalid11").empty();


     if((selectG==false && arrayOfNumbersOfValidFeelings.includes(1))||(selectH==false && arrayOfNumbersOfValidFeelings.includes(2))||
       (selectI==false && arrayOfNumbersOfValidFeelings.includes(3))||(selectJ==false && arrayOfNumbersOfValidFeelings.includes(4))||
       (selectK==false && arrayOfNumbersOfValidFeelings.includes(5))){
       $("#errorMessage").show();
     $("#invalid7").append("");
     $("#invalid8").append("");
     $("#invalid9").append("");
     $("#invalid10").append("");
     $("#invalid11").append("");

     return false
         }
       else
           return true;
     }

// set the texts from php with ajax

window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="";}

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

</script>


</body>
</html>
