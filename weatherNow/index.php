

<?php include_once './WeatherDataPhp/API_get_data.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./StyleCSS/colors_body.css">
    <link rel="stylesheet" href="./StyleCSS/InfoWeather_tab.css">
    <link rel="stylesheet" href="./StyleCSS/change_location_tab.css">

    <script src="https://kit.fontawesome.com/45a88b1ceb.js" crossorigin="anonymous"></script>
    <title>WeatherApp</title>
</head>
<body>
    <div class="change_location_box" id="cityname_input_tab">
        <div>
            <form class='flex_column' id="cityname_form" action='' method='GET'>
                <label class="cityname_label" for='Cityname'>Please provide a city name: </label>
                <input class="cityname_input" id='cityname_input' type='text' name='Cityname'>
            </form>
            <p>
                <?php echo $error_output ?>
                <span id="status-code" style="display: none;"><?php echo $status ?></span>
            </p>
        </div>
    </div>

    <div class="content_box" style="display: none;">
        <p><button class="change_location_button" id="toggle_location_form" onclick="openForm('toggle_location_form','cityname_input_tab','inline','Close location form','Change location')">Change location</button></p>
        <span class="location_title">
            <i class="fa-solid fa-location-dot"></i>
            <span id="city_name"><?php echo $city ?></span>, <?php echo $region ?>, <?php echo $country ?>
        </span>
        <p>
        <?php echo $local_date_time ?>
        </p>

        <div class="weather-temprature_tab">

            <h1 class="temperature">
                <?php echo $temperature ?>
                <span class="celsius_symbol">°</span>
            </h1>
            <div class="weather_info">
                <?php echo $weather_condition ?>
                <img src='<?php echo $weather_icon_link ?>'></img>
            </div>
        </div>

        <p>Last update at: <?php echo $last_time_updated ?> </p>
    <div>

    <script type="module" src="./javascript/save_cityname.js"></script>
    <script src="./javascript/appearance_logic.js"></script>
</body>
</html>