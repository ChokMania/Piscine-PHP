#!/usr/bin/php
<?php
	function filter($str)
	{
		$str = str_split($str);
		if ((!is_numeric($str[0]) && !$str[0]))
			return (0);
		return (1);
	}

	function epur_str($epur)
	{
		trim($epur);
		$epur = explode(" ", $epur);
		$epur = array_filter($epur, "filter");
		$epur = implode(" ", $epur);
		return ($epur);
	}

	function ft_cmp($s1, $s2)
	{
		$s1 = strtolower($s1);
		$s1 = str_split($s1);
		$s2 = strtolower($s2);
		$s2 = str_split($s2);
		$i = 0;
		while ($i <= count($s1) || $i <= count($s2))
		{
			if ($s1[$i] == $s2[$i])
				$i++;
			else if (!is_numeric($s1[$i]) && !$s1[$i] && ($s2[$i] || is_numeric($s2[$i])))
				return (-1);
			else if (!is_numeric($s2[$i]) && ($s1[$i] || is_numeric($s1[$i])) && !$s2[$i])
				return (1);
			else if (ctype_alpha($s1[$i]))
			{
				if (ctype_alpha($s2[$i]))
					return (strcmp($s1[$i], $s2[$i]));
				return (-1);
			}
			else if (is_numeric($s1[$i]))
			{
				if (is_numeric($s2[$i]))
					return (strcmp($s1[$i], $s2[$i]));
				else if (ctype_alpha($s2[$i]))
					return (1);
				return (-1);
			}
			else
			{
				if (ctype_alpha($s2[$i]) || is_numeric($s2[$i]))
					return (1);
				else
					return (strcmp($s1[$i], $s2[$i]));
			}
		}
	}

	function ft_sort($tab)
	{
		$i = 0;
		while ($i < count($tab) - 1)
		{
			if (ft_cmp($tab[$i], $tab[$i + 1]) > 0)
			{
				$tmp = $tab[$i];
				$tab[$i] = $tab[$i + 1];
				$tab[$i + 1] = $tmp;
				$i = 0;
			}
			else
				$i++;
		}
		return ($tab);
	}

	if ($argc > 1)
	{
		array_splice($argv, 0, 1);
		foreach($argv as &$elem)
		$elem = epur_str($elem);
		$tab = implode(" ", $argv);
		$tab = explode(" ", $tab);
		$tab = array_filter($tab, "filter");
		$tab = array_values($tab);
		$tab = ft_sort($tab);
		foreach($tab as $elem)
			echo "$elem\n";
	}
?>