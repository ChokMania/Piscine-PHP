#!/usr/bin/php
<?php
	echo "Entrez un nombre: ";
	while (fscanf(STDIN, "%s\n", $nbr))
	{
		if (is_numeric($nbr))
		{
			echo "Le chiffre $nbr est ";
			if ($nbr % 2 == 0)
				echo "Pair\n";
			else
				echo "Impair\n";
		}
		else
			echo "'$nbr' n'est pas un chiffre\n";
		echo "Entrez un nombre: ";
		$nbr = "";
	}
?>

