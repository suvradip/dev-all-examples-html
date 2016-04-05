<?php
    date_default_timezone_set("UTC");
    $now =  date("H:i:s", time());

    //Get random numbers
    $randomValueRetail = floor(rand(5,30));
    $randomValueOnline = floor(rand(1,10));

    //Output
	echo  "&label=".$now."&value=".$randomValueRetail."|".$randomValueOnline;
?>
