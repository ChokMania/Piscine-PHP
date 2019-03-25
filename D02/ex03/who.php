#!/usr/bin/php
<?php
	$unpack = "a256user/a4id/a32ttyname/ipid/ltype/ltv/a256host/a16pad";
	$input = file_get_contents("/var/run/utmpx");
	while ($input != "")
	{
		date_default_timezone_set("Europe/Paris");
		$result = unpack($unpack, $input);
		if ($result['type'] == 7)
		{
				echo $result['user'] . "  ";
				echo $result['ttyname'] . "  ";
				echo strftime("%b %e %H:%M", $result['tv']) . "\n";
		}
		$input = substr($input, 628);
	}
?>
