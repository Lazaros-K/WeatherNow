<?php
include_once './WeatherDataPhp/API_request_objects.php';

// FORM INPUT NAME
$FORM_NAME = "Cityname";
// API KEY
$APIkey = '510eb7be47904818b8a174646202809';

// FORM HANDLER
$get_method_cityname = "";

$status = 0;

if ($_SERVER["REQUEST_METHOD"] == "GET" && array_key_exists($FORM_NAME,$_GET)) {
    $get_method_cityname = htmlspecialchars($_GET[$FORM_NAME]);
    $status = 1;
}

// create request object
$request = new APIrequest();
$request->urlObject->seturl($APIkey,"current.json",$get_method_cityname);
$json = $request->getjson();



$data = json_decode($json);
echo "<div style='display: none;'>";
var_dump($data);
echo "</div>";

$last_time_updated = "--:--";
$city = "-";
$region = "-";
$country = "-";
$local_date_time = "--:--";
$temperature = "--";

$weather_condition = "-";
$weather_icon_link = "";

// ERROR OUTPUT
$error_output = "";

if ($get_method_cityname == "") {
    $error_output = "";
}
else if(property_exists($data,"error")) {
    if($data->error->code == 1006) {
        $error_output = "No matching location found.";
        $status = 2;
    }
}
// display info
else {
    //var_dump($data);
    $status = 10;

    $last_time_updated = explode(" ",$data->current->last_updated)[1];
    $city = $data->location->name;
    $region = $data->location->region;
    $country = $data->location->country;
    $local_date_time = $data->location->localtime;
    $temperature = $data->current->temp_c;

    $weather_condition = $data->current->condition->text;
    $weather_icon_link = $data->current->condition->icon;

}