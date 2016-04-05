<?php 
//This page is meant to output MPS Data
//The data will be picked by FusionGadgets angular gauge. 
//You need to make sure that the output data doesn't contain any HTML tags or carriage returns.

//For the sake of demo, we'll just be generating a random value between 0 and 5000 and returning the same.
//In real life applications, you can get the data from web-service or your own data systems, convert it into real-time data format and then return to the chart.


$lowerLimit; 
$upperLimit;
$randomValue1;
$randomValue2;

$lowerLimit = 60;
$upperLimit = 85;

//Generate a random value - and round it
$randomValue1 = (int) rand($lowerLimit,$upperLimit);
$randomValue2 = (int) rand($lowerLimit,$upperLimit);

//Now write it to output stream
echo "&value=" . $randomValue1 . "|" . $randomValue2
?>