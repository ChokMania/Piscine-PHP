#!/usr/bin/php
<?php
	$tmp = "a256user/a4id/a32line/ipid/ltype/ltv/a256host/ipad";
	date_default_timezone_set("Europe/Paris");
	for ($file = file_get_contents("/var/run/utmpx"); $file != ""; $file = substr($file, 628)) {
		$unpack = unpack($tmp, $file);
		if ($unpack["type"] == 7)
			$tab[] = $unpack["user"]." ".$unpack["line"]."  ".strftime("%b %e %H:%M", $unpack["tv"])."\n";
	}
	sort($tab);
	foreach ($tab as $value) {
		echo $value;
	}
?>
