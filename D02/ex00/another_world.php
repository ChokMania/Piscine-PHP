#!/usr/bin/php
<?php
	if ($argc == 2)
		echo preg_replace("/[ \t]+/", " ", trim($argv[1], " \t")) . "\n";
?>