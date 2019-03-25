<?php
	function	ft_split($text)
	{
		$text = explode(' ', $text);
		$result = array_filter($text);
		sort($result);
		return ($result);
	}
?>
