#!/usr/bin/php
<?php
	if ($argc >= 2)
	{
		$tab = preg_replace("/[ \t]+/", " ", trim($argv[1], " \t"));
		if ($tab || is_numeric($tab))
			echo $tab . "\n";
	}
?>
