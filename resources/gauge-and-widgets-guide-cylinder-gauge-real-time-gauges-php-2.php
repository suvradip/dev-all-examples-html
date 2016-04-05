<?php
//This page is meant to showcase stopUpdate and restartUpdate method.
//The data will be picked by FusionGadgets cylinder gauge.
//You need to make sure that the output data doesn't contain any HTML tags or carriage returns.

//For the sake of demo, we'll just be generating a random value and decreasing the diesel level in generator in real-time.
//In real life applications, you can get the data from web-service or your own data systems, convert it into real-time data format and then return to the chart.

session_start();

if(!isset($_SESSION['cylinder-real-time-fuelVolume-2']))
{
	$_SESSION["cylinder-real-time-fuelVolume-2"] = 110 ;
}

$randomValue;
$consVolume;
$lowerLimit = 10;
$upperLimit = 110;
$dispVolume = (int) $_SESSION["cylinder-real-time-fuelVolume-2"];

//If volume goes below 10 , refill container back to initial volume
//else update with current volume
if($dispVolume < $lowerLimit){
	$_SESSION["cylinder-real-time-fuelVolume-2"] = $upperLimit;
	$dispVolume = $_SESSION["cylinder-real-time-fuelVolume-2"];
}else{
	//Generate a random value (between 1-3) - and round it
	$randomValue = (int) rand(1,3);
	$consVolume =  $dispVolume - $randomValue;
	$_SESSION["cylinder-real-time-fuelVolume-2"] = $consVolume;
	$dispVolume = $consVolume;
}

//Now write it to output stream
echo "&value=" . $dispVolume
?>
