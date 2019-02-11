#!/usr/bin/php
<?php
	if ($argc != 2)
	{
		echo "Incorrect Parameters\n";
		return 0;
	}
	if ((!is_numeric($tab[1])) || (!is_numeric($tab[3])) || ($tab[2] != "+" && $tab[2] != "-" && $tab[2] != "/" && $tab[2] != "*" && $tab[2] != "%"))
	{
		echo "Syntax Error\n";
		return 0;
	}
	if ($tab[2] == "+")
		echo ($tab[1] + $tab[3]) . "\n";
	else if ($tab[2] == "-")
		echo ($tab[1] - $tab[3]) . "\n";
	else if ($tab[2] == "*")
		echo ($tab[1] * $tab[3]) . "\n";
	else if ($tab[2] == "/")
		echo ($tab[1] / $tab[3]) . "\n";
	else if ($tab[2] == "%")
		echo ($tab[1] % $tab[3]) . "\n";
?>