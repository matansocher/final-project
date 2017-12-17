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


        $result3 = $conn->query("SELECT ResearchGroup, count(Finished) as fin FROM Data GROUP BY ResearchGroup ORDER BY ResearchGroup ASC");

          if ($result3) {

            $arrData = array(
                "chart" => array(
                  "caption"=> " כמות נבדקים לפי קבוצת מחקר",
                         "xAxisName"=> " קבוצת מחקר",
                         "yAxisName"=> "כמות נבדקים",
                         "lineThickness"=> "2",
                         "paletteColors"=> "#0075c2",
                         "baseFontColor"=> "#333333",
                         "baseFont"=> "Helvetica Neue,Arial",
                         "captionFontSize"=> "16",
                         "subcaptionFontSize"=> "16",
                         "subcaptionFontBold"=> "0",
                         "showBorder"=> "0",
                         "bgColor"=> "#ffffff",
                         "showShadow"=> "0",
                         "canvasBgColor"=> "#f2f2f2",
                         "canvasBorderAlpha"=> "0",
                         "divlineAlpha"=> "100",
                         "divlineColor"=> "#999999",
                         "divlineThickness"=> "1",
                         "divLineDashed"=> "1",
                         "divLineDashLen"=> "1",
                         "showXAxisLine"=> "1",
                         "xAxisLineThickness"=> "1",
                         "xAxisLineColor"=> "#999999",
                         "showAlternateHGridColor"=> "0"
                )
            );

            $arrData["data"] = array();

  	// Push the data into the array
          	while($row = mysqli_fetch_array($result3)) {
             	array_push($arrData["data"], array(
                	"label" => $row["ResearchGroup"],
                	"value" => $row["fin"]
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
            $pieChart1 = new FusionCharts("line", "chart6" , 400, 250, "chart-6", "json", $jsonEncodedData);
            // Render the chart
            $pieChart1->render();

          }
        ?>
