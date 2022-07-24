<?php

require_once("fusioncharts.php");
//require_once("../../../../baseAdmin.php");
//include '../../../baseAdmin.php';
$conn = config::getConnexion();
/*$c=new connexion();
$conn=$c->cnx;*/
?>


<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>

<?php

    // Form the SQL query that returns the top 10 most populous countries
   // $strQuery = "SELECT nom, qte FROM produit ORDER BY qte DESC LIMIT 10";
        $strQuery = "SELECT id_service, count(id_service) as quantite FROM reservation GROUP BY id_service ORDER BY count(id_service) DESC LIMIT 10";
    // $strQuery= "SELECT  nomProd, COUNT(id) as nbr FROM lignecommande GROUP BY nomProd ORDER BY COUNT(id) DESC limit 5"  ;

    // Execute the query, or else return the error message.
    $result = $conn->query($strQuery);

    // If the query returns a valid response, prepare the JSON string
    if ($result) {
        // The `$arrData` array holds the chart attributes and data
        $arrData = array(
            "chart" => array(
              "caption" => "Nombre des reservations par service",
              "paletteColors" => "#01DFA5",
              "bgColor" => "#ffffff",
              "borderAlpha"=> "20",
              "canvasBorderAlpha"=> "0",
              "usePlotGradientColor"=> "0",
              "plotBorderAlpha"=> "10",
              "showXAxisLine"=> "1",
              "xAxisLineColor" => "#999999",
              "showValues" => "0",
              "divlineColor" => "#999999",
              "divLineIsDashed" => "1",
              "showAlternateHGridColor" => "0"
            )
        );

        $arrData["data"] = array();
        $s = $result->fetchAll();

// Push the data into the array
        foreach ($s as $row) {
        array_push($arrData["data"], array(
            "label" => $row["id_service"],
            "value" => $row["quantite"]
            )
        );
        }

        /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        $jsonEncodedData = json_encode($arrData);

/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        $columnChart = new FusionCharts("column2D", "myFirstChart" , 580, 300, "chart", "json", $jsonEncodedData);

        // Render the chart
        $columnChart->render();

        // Close the database connection

    }

?>

<div id="chart"><!-- Fusion Charts will render here--></div>

