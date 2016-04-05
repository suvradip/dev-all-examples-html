<?php 
date_default_timezone_set("UTC");
//Get the time Stamp
$timeStamp = $_GET['dataStamp'];
//Convert to time
$newTime =  strtotime($timeStamp);
//Generate 3 new times with 5 sec interval
$time1 =  date("H:i:s", $newTime+5);
$time2 =  date("H:i:s", $newTime+10);
$time3 =  date("H:i:s", $newTime+15);

//Get random number between 30 & 35 - rounded to 2 decimal places
        $randomValue1 = floor(rand(0,500)) / 100 + 30;
        $randomValue2 = floor(rand(0,500)) / 100 + 30;
        $randomValue3 = floor(rand(0,500)) / 100 + 30;
      
		echo  "&label=".$time1.",".$time2.",".$time3."&value=".$randomValue1.",".$randomValue2.",".$randomValue3."&dataStamp=".$time3;
?>