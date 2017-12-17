<?php


$servername = "li1415-114.members.linode.com";
$username = "exp";
$password = "y164p13";
$db = "exp";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->query("set names 'utf8'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result1 = $conn->query("SELECT Education	, count(ID) as participates FROM Data GROUP BY Education	");

  if ($result1) {

    $arrData = array(
        "chart" => array(
            "caption"=> "אחוז נבדקים לתחום השכלה",
            "enableSmartLabels"=> "0",
            "showPercentValues"=> "1",
            "showLegend"=> "1",
            "decimals"=> "1",
            "theme"=> "zune",
            "captionFontSize"=> "16",
            "subcaptionFontSize"=> "16",
            "bgColor"=> "#ffffff",
            "canvasBgColor"=> "#ffffff"
        )
    );

    $arrData["data"] = array();

// Push the data into the array
    while($row = mysqli_fetch_array($result1)) {
      array_push($arrData["data"], array(
      
          "label" => $row["Education"],
          "value" => $row["participates"]
          )
      );
    }


    /*
        JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
    */
    $jsonEncodedData = json_encode($arrData);
    /*
        Create an object for the pie chart  using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.
    */
    $pieChart = new FusionCharts("pie3D", "chart5" , 400, 250, "chart-5", "json", $jsonEncodedData);
    // Render the chart
    $pieChart->render();


  }
?>
