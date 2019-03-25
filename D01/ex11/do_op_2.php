#!/usr/bin/php
<?PHP
	function	ft_error($error)
	{
			if ($error == 1)
						echo "Incorrect Parameters\n";
				if ($error == 2)
							echo "Syntax Error\n";
	}
	function	ft_check_input($input)
	{
			$i = 0;
				$part = 1;
				$operator = 0;
					while ($i < strlen($input))
							{
										if (($part == 1 || $part == 3) && !is_numeric($input[$i]))
											return (0);
										else if (($part == 1) && is_numeric($input[$i]))
											$part = 2;
										else if (($part == 3) && is_numeric($input[$i]))
											$part = 4;
										else if (!is_numeric($input[$i]) && $input[$i] != '-'
											&& $input[$i] != '/' && $input[$i] != '+' && $input[$i] != '*'
											&& $input[$i] != '%')
											return (0);
										else if ($input[$i] == '-' || $input[$i] == '/' || $input[$i] == '+'
											|| $input[$i] == '*' || $input[$i] == '%')
										{
											$part = 3;
											$operator++;
										}
										$i++;
					}
					if ($operator != 1 || $part != 4)
						return (0);
					return (1);
	}

	if ($argc != 2)
		return (ft_error(1));
	$input = str_replace(" ", '', $argv[1]);
	$input = str_replace("\t", '', $input);
	if (!ft_check_input($input))
		return (ft_error(2));
	$first = intval($input);
	$i = 0;
	while (is_numeric($input[$i]))
		$i++;
	$second[0] = $input[$i];
	$i++;
	$j = 0;
	$third = substr($input, $i);
	if ($second[0] == '+')
		echo ($first + $third) . "\n";
	else if($second[0] == '-')
		echo ($first - $third) . "\n";
	else if ($second[0] == '*')
		echo ($first * $third) . "\n";
	else if ($second[0] == '/')
		echo ($first / $third) . "\n";
	else if ($second[0] == '%')
		echo ($first % $third) . "\n";
?>
