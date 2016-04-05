<?php
//This page is meant to output MPS Data
//The data will be picked by FusionGadgets angular gauge.
//You need to make sure that the output data doesn't contain any HTML tags or carriage returns.

//For the sake of demo, we'll just be generating a random value between 0 and 5000 and returning the same.
//In real life applications, you can get the data from web-service or your own data systems, convert it into real-time data format and then return to the chart.

	session_start();

	if(!isset($_SESSION['thermometer-gauge-real-time-gauge-thmValue-1'])){
		$_SESSION['thermometer-gauge-real-time-gauge-thmValue-1'] = -6;
	}

	$prevVal = $_SESSION['thermometer-gauge-real-time-gauge-thmValue-1'];
	$currentVal  = rand(-10, 0);
	$diff = abs($prevVal - $currentVal);
	$diff = $diff > 1 ? (rand(0, 10)/10) : $diff;

	if($currentVal > $prevVal){
		$val = $prevVal + $diff;
	}else{
		$val = $prevVal - $diff;
	}

	$_SESSION['thermometer-gauge-real-time-gauge-thmValue-1'] = $val;


	//Now write it to output stream
	echo "&value=".$val;
?>
