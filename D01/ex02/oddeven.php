#!/usr/bin/php
<?php
	while(1)
	{
		echo "Entrez un nombre: ";
		$nb = fgets(STDIN);
		$nb = rtrim($nb,"\n");
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
	}
?>
