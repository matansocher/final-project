
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
      <form class="hebrew" action="feeling2.php" method="post"  onsubmit="return validateForm()">
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

    for (i = 0; i < 6; i++) {
      if (arr[i] !== "") {
        var actionName = getActionName(i+1);
        arrayOfNumbersOfValidFeelings.push(i+1);
        var add = "<h3><strong>" + arr[i+3] + ":</strong><label class='invalid' id='invalid" + (i+1) + "'></label></h3>";
        add += "<input type='radio' name='" + (actionName) + "'value='5'> " + arr[19] + "<br>";
        add += "<input type='radio' name='" + (actionName) + "'value='4'> " + arr[18] + "<br>";
        add += "<input type='radio' name='" + (actionName) + "'value='3'> " + arr[17] + "<br>";
        add += "<input type='radio' name='" + (actionName) + "'value='2'> " + arr[16] + "<br>";
        add += "<input type='radio' name='" + (actionName) + "'value='1'> " + arr[15] + "<br><hr>";
        $("#contentDiv").append(add);
      }
    }

    $("#pageNumber").append("<strong>עמוד 1 מתוך 2</strong>");

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

   var selectA=false;
   var selectB=false;
   var selectC=false;
   var selectD=false;
   var selectE=false;
   var selectF=false;

   function validateForm() {

   var radioButtonA = document.getElementsByName("a");
   var radioButtonB = document.getElementsByName("b");
   var radioButtonC = document.getElementsByName("c");
   var radioButtonD = document.getElementsByName("d");
   var radioButtonE = document.getElementsByName("e");
   var radioButtonF = document.getElementsByName("f");

   for(var i = 0; i < radioButtonA.length; i++) {
     if(radioButtonA[i].checked == true) {
      selectA = true;
      }
     }
     if(selectA == false){
     $("#invalid1").empty();
     $("#invalid1").append("*");
   }else
       $("#invalid1").empty();

       for(var i = 0; i < radioButtonB.length; i++) {
         if(radioButtonB[i].checked == true) {
          selectB = true;
          }
         }
         if(selectB == false){
         $("#invalid2").empty();
         $("#invalid2").append("*");
       }else
           $("#invalid2").empty();

           for(var i = 0; i < radioButtonC.length; i++) {
             if(radioButtonC[i].checked == true) {
              selectC = true;
              }
             }
             if(selectC == false){
             $("#invalid3").empty();
             $("#invalid3").append("*");
           }else
               $("#invalid3").empty();

             for(var i = 0; i < radioButtonD.length; i++) {
                 if(radioButtonD[i].checked == true) {
                  selectD = true;
                  }
                 }
                 if(selectD == false){
                 $("#invalid4").empty();
                 $("#invalid4").append("*");
               }else
                   $("#invalid4").empty();

                   for(var i = 0; i < radioButtonE.length; i++) {
                       if(radioButtonE[i].checked == true) {
                        selectE = true;
                        }
                       }
                       if(selectE == false){
                       $("#invalid5").empty();
                       $("#invalid5").append("*");
                     }else
                         $("#invalid5").empty();

                     for(var i = 0; i < radioButtonF.length; i++) {
                           if(radioButtonF[i].checked == true) {
                              selectF = true;
                              }
                             }
                             if(selectF == false){
                             $("#invalid6").empty();
                             $("#invalid6").append("*");
                           }else
                               $("#invalid6").empty();

   if((selectA==false && arrayOfNumbersOfValidFeelings.includes(1))||(selectB==false && arrayOfNumbersOfValidFeelings.includes(2))||
     (selectC==false && arrayOfNumbersOfValidFeelings.includes(3))||(selectD==false && arrayOfNumbersOfValidFeelings.includes(4))||
     (selectE==false && arrayOfNumbersOfValidFeelings.includes(5))||(selectF==false && arrayOfNumbersOfValidFeelings.includes(6))){
     $("#errorMessage").show();
   $("#invalid1").append("");
   $("#invalid2").append("");
   $("#invalid3").append("");
   $("#invalid4").append("");
   $("#invalid5").append("");
   $("#invalid6").append("");

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
