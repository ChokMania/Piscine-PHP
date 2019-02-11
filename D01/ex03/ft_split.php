#!/usr/bin/php
<?php
	function ft_split($text)
	{
		$test = explode(" ", $text);
		$result = array_filter($test);
		sort($result);
		return($result);
	}
?>