#!/usr/bin/php
<?php
	if ($argc == 2)
		echo $tab = preg_replace("/[ \t]+/", " ", trim($argv[1], " \t")) . "\n";
?>