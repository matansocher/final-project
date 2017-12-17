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


        $result3 = $conn->query("SELECT ExperimentNumber, count(Finished) as fin FROM Data GROUP BY ExperimentNumber ORDER BY ExperimentNumber ASC");

          if ($result3) {

            $arrData = array(
          	    "chart" => array(
                    "caption" => "כמות משתתפים בניסוי",
                    "showValues" => "0",
                    "theme"=> "zune",
                           "xAxisName"=> "מספר ניסוי",
                           "yAxisName"=> "כמות נבדקים",
                    "paletteColors"=> "#ff6600",
                    "valueFontColor"=> "#ffffff",
                    "baseFont"=> "Helvetica Neue,Arial",
                    "captionFontSize"=> "16",
                    "subcaptionFontSize"=> "16",
                    "subcaptionFontBold"=> "0",
                    "placeValuesInside"=> "1",
                    "rotateValues"=> "1",
                    "showShadow"=> "0",
                    "bgColor"=> "#ffffff",
                    "divlineColor"=> "#999999",
                    "divLineDashed"=> "1",
                    "divlineThickness"=> "1",
                    "divLineDashLen"=> "1",
                    "canvasBgColor"=> "#ffffff"

                	)
             	);

            $arrData["data"] = array();

  	// Push the data into the array
          	while($row = mysqli_fetch_array($result3)) {
             	array_push($arrData["data"], array(
                	"label" => $row["ExperimentNumber"],
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
            $pieChart1 = new FusionCharts("column3D", "chart4" , 400, 250, "chart-4", "json", $jsonEncodedData);
            // Render the chart
            $pieChart1->render();

          }
        ?>
