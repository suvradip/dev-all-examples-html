<?php 
	session_start();
	
	if(!isset($_SESSION['thmValueUpdate'])){
		$_SESSION['thmValueUpdate'] = -6;
	}
	
	$prevVal = $_SESSION['thmValueUpdate'];
	$currentVal  = rand(-10, 0);
	$diff = abs($prevVal - $currentVal);
	$diff = $diff > 1 ? (rand(0, 10)/10) : $diff;
	
	if($currentVal > $prevVal){
		$val = $prevVal + $diff;
	}else{
		$val = $prevVal - $diff;
	} 
	
	$_SESSION['thmValueUpdate'] = $val;

	
	//Now write it to output stream
	echo "&value=".$val;
?>