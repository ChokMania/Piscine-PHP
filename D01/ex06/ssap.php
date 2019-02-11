#!/usr/bin/php
<?php
	function ft_split($text)
	 {
		 $test = explode(" ", $text);
		 $result = array_filter($test);
		 sort($result);
		 return($result);
	 }
	 if ($argc > 1)
	{
		$final = array();
		for ($i = 1; $i < count($argv); $i++)
		{
			$str = trim(preg_replace('/ +/', ' ', $argv[$i]));
			$result = ft_split($str);
			for ($j = 0; $j < count($result); $j++) { 
				$word = array_push($final, $result[$j]);
			}
		}
		sort($final);
		for ($i = 0; $i < count($final); $i++)
			echo ($final[$i]."\n");
	}
?>