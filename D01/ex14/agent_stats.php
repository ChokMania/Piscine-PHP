#!/usr/bin/php
<?php
	if ($argc < 2 || $argc > 2 || ($argv[1] != "moyenne" &&
		$argv[1] != "moyenne_user" && $argv[1] != "ecart_moulinette"))
		exit();
	$file = file("php://stdin");
	unset($file[0]);
	for ($i = 1; $file[$i]; $i++) {
		$file[$i] = explode(";", $file[$i]);
		if (strlen($file[$i][1]) == 0)
			unset($file[$i]);
	}
	asort($file);
	$file = array_values($file);
	if ($argv[1] == "moyenne")
	{
		for ($i = 0; $file[$i]; $i++)
			if ($file[$i][2] != "moulinette")
				$moy += $file[$i][1];
			else
				$nb++;
		echo $moy/($i - $nb)."\n";
	}
	else
	{
		for ($i = 0; $file[$i]; $i++) {
			if ($file[$i][2] != "moulinette") {
				$tab1[$file[$i][0]] += $file[$i][1];
				$tab2[$file[$i][0]]++;
			}
		}
		$tmp = (array_keys($tab1));
		if ($argv[1] == "moyenne_user")
			for ($i = 0; $tmp[$i]; $i++) {
				echo $tmp[$i].":".$tab1[$tmp[$i]]/$tab2[$tmp[$i]]."\n";
			}
		else
		{
			for ($i = 0; $file[$i]; $i++)
				if ($file[$i][2] == "moulinette") {
					$tab3[$file[$i][0]] = $file[$i][1];
				}
			for ($i = 0; $tmp[$i]; $i++) {
				echo $tmp[$i].":".($tab1[$tmp[$i]]/$tab2[$tmp[$i]] - $tab3[$tmp[$i]])."\n";
			}
		}
	}
?>