#!/usr/bin/php
<?php
	echo "Entrez un nombre: ";
	while (fscanf(STDIN, "%s\n", $nb))
	{
		if (!is_numeric($nb))
				echo  "'$nb' est pas un chiffre\n";
		else
		{
			echo "Le nombre $nb est ";
			if ($nb % 2 == 0)
				echo  "Pair\n";
			else
				echo "Impair\n";
		}
		echo "Entrez un nombre: ";
	}
?>