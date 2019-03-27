<?php
	function	ft_is_sort($tab)
	{
		$i = 0;
		while ($i < count($tab) - 1)
		{
			if (strcmp($tab[$i], $tab[$i + 1]) > 0)
				return (0);
			$i++;
		}
		return (1);
	}
?>
