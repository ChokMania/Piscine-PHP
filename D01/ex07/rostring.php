#!/usr/bin/php
<?php
	function	ft_split($text)
	{
		$text = explode(' ', $text);
		$result = array_filter($text);
		return ($result);
	}
	if ($argc < 2 || $argv[1] == "")
		return ;
	$result = array();
	$tmp = trim(preg_replace('/ +/', ' ', $argv[1]));
	$result = ft_split($tmp);
	$i = 1;
	$count = count($result) - 1;
	while ($i < count($result))
	{
		echo $result[$i];
		echo " ";
		$i++;
	}
	echo $result[0];
	echo "\n";
?>
