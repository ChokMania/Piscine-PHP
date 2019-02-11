#!/usr/bin/php
<?php
	function ft_is_sort($test)
	{
		if (count($test) == 1)
			return (TRUE);
		$tmp = $test;
		sort($tmp);
		for ($i = 0; $i < count($test); $i++)
		{
			if (strcmp($tmp[$i], $test[$i]))
				return (FALSE);
		};
		return (TRUE);
	}
?>