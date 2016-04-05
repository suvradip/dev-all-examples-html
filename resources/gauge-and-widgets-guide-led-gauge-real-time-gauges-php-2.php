<?php 
//This page is meant to output MPS Data
//The data will be picked by FusionGadgets angular gauge. 
//You need to make sure that the output data doesn't contain any HTML tags or carriage returns.

//For the sake of demo, we'll just be generating a random value between 0 and 5000 and returning the same.
//In real life applications, you can get the data from web-service or your own data systems, convert it into real-time data format and then return to the chart.

	session_start();
	
	if(!isset($_SESSION['myvalue'])){
		$_SESSION['myvalue'] = 50;
		$_SESSION['myflag'] = 0;
	}
	
	$val = $_SESSION['myvalue'];
	$flag = $_SESSION['myflag'];
	
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
	
	$_SESSION['myvalue'] = $val;
	$_SESSION['myflag'] = $flag;
	
	//Now write it to output stream
	echo "&value=".$val;
?>