
<?php

$str = '<chart caption="Monthly revenue for last year" subcaption="Harry&apos;s SuperMart" xaxisname="Month" yaxisname="Revenues (In USD)" numberprefix="$" theme="fint" animation="1">
    <set label="Jan" value="420000" />
    <set label="Feb" value="810000" />
    <set label="Mar" value="720000" />
    <set label="Apr" value="550000" />
    <set label="May" value="910000" />
    <set label="Jun" value="510000" />
    <set label="Jul" value="680000" />
    <set label="Aug" value="620000" />
    <set label="Sep" value="610000" />
    <set label="Oct" value="490000" />
    <set label="Nov" value="900000" />
    <set label="Dec" value="730000" />
    <trendlines>
        <line startvalue="700000" color="#1aaf5d" valueonright="1" displayvalue="Monthly Target" />
    </trendlines>
</chart>';

// sleep for 2 seconds
sleep(2);
// wake up !
echo $str;

?>
