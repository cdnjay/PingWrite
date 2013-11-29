<?php

/* Load the PHP Ping class
https://github.com/geerlingguy/Ping */
require "Ping.php";

// Settings for the target server
$host1 = "www.cconsulting.ca";

// Settings for a reliable secondary target
$host2 = "www.google.ca";

// Ping target server
$ping1 = new Ping($host1);
$latency1 = $ping1->ping();

// If target server fails ping secondary target
if (!$latency1 || $latency1 >= 10000) {
	
	$ping2 = new Ping($host2);
	$latency2 = $ping2->ping();
		
		// If secondary target responds append incident and time to daily log file
		if ($latency2 || $latency2 <= 10000) {
			
			$day = date('Y-m-d');
			$myFile = "pingLogFile_$day.txt";
			$fh = fopen($myFile, 'a');
			$stringData = $host1 . " timed out, " . $host2 . " is up with " . $latency2 . "ms latency at " . date('H:i:s') . "\n";
			fwrite($fh, $stringData);
			fclose($fh);
			
		}
		
}

?>
