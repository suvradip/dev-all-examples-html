<?php 
date_default_timezone_set("UTC");
$time1 =  date("H:i:s", time()+5);
$time2 =  date("H:i:s", time()+10);
$time3 =  date("H:i:s", time()+15);

//Get random number between 30 & 35 - rounded to 2 decimal places
        $randomValue1 = floor(rand(0,500)) / 100 + 30;
        $randomValue2 = floor(rand(0,500)) / 100 + 30;
        $randomValue3 = floor(rand(0,500)) / 100 + 30;
      
		echo  "&label=".$time1.",".$time2.",".$time3."&value=".$randomValue1.",".$randomValue2.",".$randomValue3;
?>