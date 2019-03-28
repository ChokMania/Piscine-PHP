#!/usr/bin/php
<?PHP
	function	ft_set_up($inbalise)
	{
		$i = 0;
		$inside = 1;
		while ($i < strlen($inbalise[0]) - 1)
		{
			if (substr_compare($inbalise[0], "title=", $i, 6) == 0)
			{
				if ($inbalise[0][$i + 6] == '"')
				{
					$inside = 0;
					$i += 6;
				}
			}
			else if ($inbalise[0][$i] == '>' && $inside == 1)
			{
				$inside = 0;
			}
			else if (($inbalise[0][$i] == '<' || $inbalise[0][$i] == '"')
					&& $inside == 0)
			{
				$inside = 1;
			}
			else if (ctype_alpha($inbalise[0][$i]) == 1 && $inside == 0)
			{
				$inbalise[0][$i] = strghtoupper($inbalise[0][$i]);
			}
			$i++;
		}
		return ($inbalise);
	}

	if ($argc != 2)
	{
		return ;
	}
	$fd = fopen($argv[1], "r");
	$file = fread($fd, filesize($argv[1]));
	while ($i < strlen($file) - 1)
	{
		if ($file[$i] == '<' && $file[$i + 1] == 'a' && $isinbalise == 0)
		{
			preg_match("'\<a(.+)\<\/a>'", substr($file, $i), $inbalise);
			$inbalise = ft_set_up($inbalise);
			echo substr($file, $start, $i - $start);
			$isinbalise = 1;
		}
		else if ($file[$i] == '<' && $file[$i + 1] == '/'
				&& $file[$i + 2] == 'a')
		{
			echo $inbalise[0];
			$isinbalise = 0;
			$i = $i + 3;
			$start = $i + 1;
		}
		$i++;
	}
	echo substr($file, $start, $i - $start) . "\n";
?>