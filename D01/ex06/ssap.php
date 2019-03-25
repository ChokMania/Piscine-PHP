#!/usr/bin/php
<?php
	function	ft_split($text)
	{
		$text = explode(' ', $text);
		$result = array_filter($text);
		sort($result);
		return ($result);
	}
	if ($argc < 2)
		return ;
	$j = 0;
	$print = array();
	while ($j + 1 < $argc)
	{
		$strtmp = trim($argv[$j + 1], " ");
		$strtmp = preg_replace('/ +/',' ', $strtmp);
		$tabtmp = ft_split($strtmp);
		$i = 0;
		while ($i++ < count($tabtmp))
			array_push($print, $tabtmp[$i - 1]);
		$j++;
	}
	$i = 0;
	sort($print);
	while ($i < count($print))
	{
		echo $print[$i] . "\n";
		$i++;
	}
?>
