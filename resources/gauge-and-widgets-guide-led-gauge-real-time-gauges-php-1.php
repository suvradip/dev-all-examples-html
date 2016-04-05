<?php 
//This page is meant to output MPS Data
//The data will be picked by FusionGadgets angular gauge. 
//You need to make sure that the output data doesn't contain any HTML tags or carriage returns.

//For the sake of demo, we'll just be generating a random value between 0 and 5000 and returning the same.
//In real life applications, you can get the data from web-service or your own data systems, convert it into real-time data format and then return to the chart.

	session_start();
	
	if(!isset($_SESSION['value'])){
		$_SESSION['value'] = 50;
		$_SESSION['flag'] = 0;
	}
	
	$val = $_SESSION['value'];
	$flag = $_SESSION['flag'];
	
	if($flag == 0 ){
		$val -= 5;
		if($val == 5){
			$flag = 1;
		}
	}
	else
	{
		$val += 5;
		if($val == 100){
			$flag = 0;
		}
	}
	
	$_SESSION['value'] = $val;
	$_SESSION['flag'] = $flag;
	
	//Now write it to output stream
	echo "&value=".$val;
?>