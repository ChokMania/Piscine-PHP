#!/usr/bin/php
<?php
	if (count($argv) == 2)
	{
		$str = trim($argv[1]);
		$str = preg_replace('/ +/', ' ', $str);
		echo  $str . "\n";
	}
?>