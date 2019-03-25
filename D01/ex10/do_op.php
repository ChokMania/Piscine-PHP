#!/usr/bin/php
<?php
	function	ft_error()
	{
		echo "Incorrect Parameters\n";
	}

	if ($argc != 4)
		return (ft_error());
	$first = trim($argv[1], "\t ");
	$second = trim($argv[2], "\t ");
	$third = trim($argv[3], "\t ");
	if (!is_numeric($first) || !is_numeric($third))
		return (ft_error());
	if ($second != '/' && $second != '+' && $second != '*' && $second
		!= '-' && $second != '%')
		return (ft_error());
	if ($second == '+')
		echo ($first + $third) . "\n";
	else if($second == '-')
		echo ($first - $third) . "\n";
	else if ($second == '*')
		echo ($first * $third) . "\n";
	else if ($second == '/')
		echo ($first / $third) . "\n";
	else if ($second == '%')
		echo ($first % $third) . "\n";
?>
