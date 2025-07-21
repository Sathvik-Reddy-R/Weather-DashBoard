<?php
if(isset($_POST['city'])) { //isset checks whether the form has been submitted
    $city = htmlspecialchars($_POST['city']); //removes unnecessary characters
    $apiKey= `adc0f140e385d83474afe2cb1c1dbf50`; // apikey
    $url = `https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric`;//replaces with required data like apikey and city and C or F
    $response=file_get_contents($url); //gets the data from the url
    $data = json_decode($response, true); //decodes the json data into an array noty object
    if ($data['cod'] == 200) {
        $temperature = $data['main']['temp'];
        $humidity = $data['main']['humidity'];
        $description = $data['weather'][0]['description'];
        echo "Temperature: {$temperature}°C<br>";
        echo "Humidity: {$humidity}%<br>";
        echo "Description: {$description}<br>";
    } else {
        echo "City not found.";
    } 
}
    else {
        echo "Please enter a city name.";
    }
?>