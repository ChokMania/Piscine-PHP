#!/usr/bin/php
<?php
	if (count($argv) != 4)
	{
		echo "Incorrect Parameters\n";
		return ;
	}
	$nb1 = intval($argv[1]);
	$nb2 = intval($argv[3]);
	$eval = trim($argv[2]);
	if ($eval == "+")
		echo $nb1 + $nb2;
	if ($eval == "-")
		echo $nb1 - $nb2;
	if ($eval == "*")
		echo $nb1 * $nb2;
	if ($eval == "/")
		echo $nb1 / $nb2;
	if ($eval == "%")
		echo $nb1 % $nb2;
	echo "\n";
?>