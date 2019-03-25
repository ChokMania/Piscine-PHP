#!/usr/bin/php
<?php
	if ($argc < 3)
	{
		return ;
	}
	$key = $argv[1];
	$i = 2;
	$ok = 0;
	while ($i < $argc) {
		if (strncmp($key, $argv[$i], strlen($key)) == 0)
		{
			$lenargv = strlen($argv[$i]);
			$lenkey = strlen($key);
			if ($lenargv > $lenkey + 1)
			{
				if ($argv[$i][$lenkey] == ':')
				{
					$ok = 1;
					$value = substr($argv[$i], strlen($key) + 1);
				}
			}
		}
		$i++;
	}
	if ($ok == 1)
		echo $value . "\n";
?>