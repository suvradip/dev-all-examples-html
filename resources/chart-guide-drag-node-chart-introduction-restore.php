
<?php
	$filename = '../xml/chart-guide-drag-node-chart-introduction.xml';
	$somecontent = "<chart caption='US Subway Map' xaxisminvalue='0' xaxismaxvalue='100' yaxisminvalue='0' yaxismaxvalue='100' is3d='0' showformbtn='1' formaction='resources/php/chart-guide-drag-node-chart-introduction-update.php' formtarget='_blank' formmethod='POST' formBtnTitle='Save' viewmode='0' showplotborder='1' plotborderthickness='4' theme='fint' showCanvasBorder='1' canvasBorderAlpha='20'>
      <dataset>
        <set id='01' label='Santa Monica' color='#ffffff' x='16' y='54' radius='30' shape='circle' />
        <set id='02' label='Los Angeles' color='#ffffff' x='27' y='54' radius='30' shape='circle' />
        <set id='03' label='Ontario' color='#ffffff' x='48' y='54' radius='30' shape='circle' />
        <set id='04' label='Phoenix' color='#ffffff' x='85' y='54' radius='30' shape='circle' />
        <set id='05' label='Flagstaff' color='#ffffff' x='85' y='80' radius='30' shape='circle' />
        <set id='06' label='Barstow' color='#ffffff' x='62' y='80' radius='30' shape='circle' />
        <set id='07' label='San Diego' color='#ffffff' x='35' y='30' radius='30' shape='circle' />
        <set id='08' label='San Ysidro' color='#ffffff' x='40' y='12' radius='30' shape='circle' />
        <set id='09' label='Las Vegas' color='#ffffff' x='68' y='93' radius='30' shape='circle' />
        <set id='10' label='' color='#ffffff' x='12' y='98' radius='0' shape='circle' />
        <set id='11' label='' color='#ffffff' x='100' y='80' radius='0' shape='circle' />
        <set id='12' label='' color='#ffffff' x='99' y='40' radius='0' shape='circle' />
        <set id='13' label='Yuma' color='#ffffff' x='70' y='30' radius='30' shape='circle' />
        <set id='14' label='' color='#ffffff' x='100' y='30' radius='0' shape='circle' />
      </dataset>
      <connectors color='#ffffff' stdthickness='10'>
        <connector strength='2' from='01' to='02' color='#fec110' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='02' to='03' color='#fec110' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='03' to='04' color='#fec110' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='04' to='12' color='#fec110' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='04' to='05' color='#a6aaad' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='09' to='06' color='#0178bc' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='06' to='03' color='#0178bc' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='03' to='07' color='#0178bc' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='05' to='06' color='#f1277d' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='06' to='11' color='#f1277d' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='02' to='07' color='#c1c733' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='07' to='08' color='#c1c733' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='02' to='10' color='#c1c733' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='07' to='13' color='#6d6e70' arrowatstart='0' arrowatend='0' />
        <connector strength='2' from='13' to='14' color='#6d6e70' arrowatstart='0' arrowatend='0' />
      </connectors>
      <labels />
</chart>
";

	// Let's make sure the file exists and is writable first.
	if (is_writable($filename)) {

		// In our example we're opening $filename in append mode.
		// The file pointer is at the bottom of the file hence
		// that's where $somecontent will go when we fwrite() it.
		if (!$handle = fopen($filename, 'w')) {
			 echo "Cannot open file ($filename)";
			 exit;
		}

		// Write $somecontent to our opened file.
		if (fwrite($handle, $somecontent) === FALSE) {
			echo "Cannot write to file ($filename)";
			exit;
		}

		echo "Success, wrote ($somecontent) to file ($filename)";

		fclose($handle);

	} else {
		echo "The file $filename is not writable";
	}
?>
