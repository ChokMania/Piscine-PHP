#!/usr/bin/php
<?php
	if ($argc < 2)
		exit();
	date_default_timezone_set("Europe/Paris");
	if (preg_match("/(^[L|l]undi|^[M|m]ardi|^[M|m]ercredi|^[J|j]eudi|^[V|v]endredi|^[S|s]amedi|^[D|d]imanche) {1}([0-9]{1,2}) {1}([J|j]anvier|[F|f]evrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]out|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d]ecembre) {1}[0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/", $argv[1]) == 0)
	{
		echo "Wrong Format\n";
		exit();
	}
	$tab = explode(" ", $argv[1]);
	$monthAvailable = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
	$tab[2] = array_search(strtolower($tab[2]), $monthAvailable) + 1;
	echo strtotime($tab[3].":".$tab[2].":".$tab[1]." ".$tab[4])."\n";
?>