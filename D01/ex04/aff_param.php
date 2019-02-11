#!/usr/bin/php
<?php
	foreach ($argv as $valeur) {
		if ($valeur != $argv[0])
			echo "$valeur\n";
	}
?>