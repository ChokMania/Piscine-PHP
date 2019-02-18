#!/usr/bin/php
<?php
	function ft_split($text)
	{
		$test = explode(" ", $text);
		$result = array_filter($test);
		sort($result);
		return($result);
	}
	if ($argc < 2)
	{
		echo "\n";
		return ;
	}
	$elem = array();
	foreach ($argv as $arg)
	{
		if ($arg != $argv[0])
		{
			$tab = ft_split($arg);
			$elem = array_merge($elem, $tab);
		}
	}
	$i = 0;
	foreach ($elem as $test)
	{
		if(is_numeric($test) == TRUE)
			$numeric[$i++] = $test;
		else if(ctype_alpha($test) == TRUE)
			$string[$i++] = $test;
		else if(ctype_alpha($test) == FALSE && is_numeric($test) == FALSE)
			$ascii[$i++] = $test;
	}
	sort($numeric, SORT_FLAG_CASE | SORT_STRING);
	sort($string, SORT_NATURAL | SORT_FLAG_CASE);
	sort($ascii);
	foreach($string as $element)
		echo $element . "\n";
	foreach($numeric as $element)
		echo $element . "\n";
	foreach($ascii as $element)
		echo $element. "\n";
?>