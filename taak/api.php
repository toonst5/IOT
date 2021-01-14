<?php
$jsonfile = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=Laakdal&appid=6793d1710e907abecc665676fd424238");
$jsondata = json_decode($jsonfile);
$api_temp = $jsondata->main->temp;
$api_pressure = $jsondata->main->pressure;
$api_mintemp = $jsondata->main->temp_min;
$api_maxtemp = $jsondata->main->temp_max;
$api_wind = $jsondata->wind->speed;
$api_humidity = $jsondata->main->humidity;
$api_desc = $jsondata->weather[0]->description;
$api_maind = $jsondata->weather[0]->main;



echo "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>ESP-weatherstation RSS</title>
 <link></link>
 <description>rss feed</description>
 <language>en-us</language>";
 echo "<item>";
 echo "<br>";
 echo "<H3>WEER IN Laakdal </H3>";

    echo "<br>";
    echo "hoe ist: ";
    echo $api_maind;
    echo "<br>";
    echo "temperatuur: ";
    echo $api_temp;
    echo "<br>";
    echo "druk: ";
    echo $api_pressure;

    echo "<br>";
    echo "Minimum: ";
    echo $api_mintemp;
    echo "<br>";
    echo "Maximum: ";
    echo $api_maxtemp;
    echo "<br>";
    echo "Windkracht: ";
    echo $api_wind;
    echo "<br>";
    echo "Vochtigheid: ";
    echo $api_humidity;
    echo "<br>";


 echo" </item>";

 echo "</channel></rss>";

?>