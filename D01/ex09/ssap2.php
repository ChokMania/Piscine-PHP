#!/usr/bin/php
<?php
	function	ft_cmp($s1, $s2)
	{
		$s1 = strtolower($s1);
		$s2 = strtolower($s2);
		$i = 0;
		while ($s1[$i])
		{
			if ($s1[$i] != $s2[$i])
			{
				if (Ctype_alpha($s1[$i]) && Ctype_alpha($s2[$i]))
					return (strcmp($s1[$i], $s2[$i]));
				else if (is_numeric($s1) && is_numeric($s2))
					return (strcmp($s1[$i], $s2[$i]));
				else if (Ctype_alpha($s1[$i]) && !Ctype_alpha($s2[$i]))
					return (-1);
				else if (!Ctype_alpha($s1[$i]) && Ctype_alpha($s2[$i]))
					return (1);
				else if (is_numeric($s1[$i]) && !is_numeric($s2[$i]))
					return (-1);
				else if (!is_numeric($s1[$i]) && is_numeric($s2[$i]))
					return (1);
				else
					return (strcmp($s1[$i], $s2[$i]));
			}
			$i++;
		}
		return ($s1[$i] - $s2[$i]);
	}
	if ($argc < 2)
		return ;
	$j = 0;
	$tab = array();
	while ($j + 1 < $argc)
	{
		$strtmp = trim($argv[$j + 1], " ");
		$strtmp = preg_replace('/ +/',' ', $strtmp);
		$tabtmp = explode(' ', $strtmp);
		$i = 0;
		while ($i++ < count($tabtmp))
			array_push($tab, $tabtmp[$i - 1]);
		$j++;
	}
	$i = 0;
	while ($i < count($tab) - 1)
	{
		if (ft_cmp($tab[$i], $tab[$i + 1]) > 0)
		{
			$tmp = $tab[$i];
			$tab[$i] = $tab[$i + 1];
			$tab[$i + 1] = $tmp;
			$i = -1;
		}
		$i++;
	}
	foreach($tab as $print)
		echo $print . "\n";
?>
