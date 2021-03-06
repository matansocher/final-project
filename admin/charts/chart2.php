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


     	$result2 = $conn->query("SELECT Date, count(ID) as participates FROM Data GROUP BY Date ORDER BY Date ASC");

     	if ($result2) {

        	$arrData = array(
        	    "chart" => array(
                  "caption" => "כמות נבדקים לפי תאריך",
                  "xAxisName"=> "תאריך ",
                  "yAxisName"=> "כמות נבדקים",
                  "showValues" => "0",
                  "theme"=> "zune",
                  "paletteColors"=> "#0075c2",
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
        	while($row = mysqli_fetch_array($result2)) {
           	array_push($arrData["data"], array(
              	"label" => $row["Date"],
              	"value" => $row["participates"]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	$columnChart = new FusionCharts("column3D", "chart2" , 400, 250, "chart-2", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

        	// Close the database connection

     	}

  	?>
