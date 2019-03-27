#!/usr/bin/php
<?php
	if ($argc != 2)
		exit();
	$file = file($argv[1]);
	$str = array();
	foreach ($file as $value)
		if (preg_match("<a.*/a>", $value , $res) == 1)
			$str = array_merge($str, $res);
	$stre =  array();
	$i = 0;
	foreach ($str as $value)
	{
		$stre[$i] = "<".preg_replace('/>[ a-zA-Z]*</e', 'strtoupper("$0")', strtolower($value)).">\n";
		$stre[$i] = preg_replace('/"[ A-Za-z]*"/e', 'strtoupper("$0")', $stre[$i]);
		$i++;
	}
	$i = 0;
	$result = array();
	foreach ($file as $value)
	{
		if (preg_match("<a.*/a>", $value , $res) == 1)
			array_push($result, $stre[$i++]);
		else
			array_push($result, $value);
	}
	for ($i = 0; $result[$i]; $i++)
		echo $result[$i];
?>