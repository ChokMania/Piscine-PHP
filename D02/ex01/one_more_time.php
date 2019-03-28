#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');
	if ($argc != 2)
		exit();
	if (!preg_match("/(^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi|^[S|s]amedi|^[D|d]imanche) [0-9]{1,2} ([J|j]anvier|[F|f]evrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]out|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d]ecembre) [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/", $argv[1]) && print("Wrong Format\n"))
		exit();
	$tab = explode(" ", $argv[1]);
	$monthAvailable = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
	$tab[2] = array_search(strtolower($tab[2]), $monthAvailable) + 1;
	$tab[4] = explode(":", $tab[4]);
	echo mktime($tab[4][0], $tab[4][1], $tab[4][2], $tab[2], $tab[1], $tab[3])."\n";
?>