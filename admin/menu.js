var counter=1;
function changeExpOnMenu(){
  var x="<i class='fa fa-chevron-down' aria-hidden='true'></i>";
  var y="<i class='fa fa-chevron-left' aria-hidden='true'></i>";
  if(counter%2==0){
      $("#expMenu").html(y);
    }
    else {
      $("#expMenu").html(x);
    }
      counter++;
return;
}
