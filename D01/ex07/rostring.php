#!/usr/bin/php
<?php
if ($argc > 1)
{
	for ($i = 0; $i < $argc; $i++)
	{
		$final = trim(preg_replace('/ +/', ' ', $argv[1]));
		$final = explode(" ", $str);
	}
	for ($i = 1; $i < count($final); $i++)
		echo $final[$i] . " ";
	echo ($final[0]."\n");
}
?>