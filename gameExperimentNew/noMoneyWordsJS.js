$(document).ready(function(){
  $("article").hide();
//random words to shows on buttons -->

$.ajax({
    type: "GET",
    url: "getSentenceNumAndInsertToDB.php",
    success: function(data){

  var parsed = JSON.parse(data); // get parsed JSON
  var arr = []; // empty array
  for(var x in parsed){
    arr.push(parsed[x]); // push every element to the array
  }

  $("#header").append(arr[5]);
  $("#description").append(arr[6]);
  $("#errorMessage").append(arr[7]);

    var wordsContainer = [arr[0],arr[1],arr[2],arr[3],arr[4]];

//  var sentence;
//       sentence=data;
//
//       var wordsContainer;
//
//       var a1 = ["קיבלתי", "חבילה", "עם", "צלחת", "גדולה"];
//       var a2 = ["יש", "לי", "ארגז", "מלא", "פירות"];
//       var a3 = ["למדתי", "המון", "דברים", "בסדנה", "מקצועית"];
//
//
// switch(sentence) {
//     case "4":
//         wordsContainer=a1;
//         break;
//     case "5":
//         wordsContainer=a2;
//         break;
//     case "6":
//         wordsContainer=a3;
//         break;
//     default:
// }


arrayOfRandomWords=["","","","",""];
generalLen = wordsContainer.length;

var flag=false;

for (var i = 0; i < arrayOfRandomWords.length; i++) {
  var word=wordsContainer[getRndNum(0, generalLen-1)];
    for(var j = 0; j < i+1; j++){
      if(arrayOfRandomWords[j]==word)
        flag=true;
     }
     if(!flag)
       arrayOfRandomWords[i]=word; //word is not exist-  add the word to array
      else
        i--; // word exist try again

     flag=false;// initalize flage
}

document.getElementById("btn01").innerHTML = arrayOfRandomWords[0];
document.getElementById("btn02").innerHTML = arrayOfRandomWords[1];
document.getElementById("btn03").innerHTML = arrayOfRandomWords[2];
document.getElementById("btn04").innerHTML = arrayOfRandomWords[3];
document.getElementById("btn05").innerHTML = arrayOfRandomWords[4];
          }
      });
      setTimeout(function(){
            $("#loader").hide();
            $("article").show();
        }, 1000);
 });

function getRndNum(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}
