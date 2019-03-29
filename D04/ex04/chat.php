<?php
session_start();
date_default_timezone_set("Europe/Paris");
$file = "../private/chat";
$clear = 0;
$unclear = 0;
$setcolor = 0;

function	ft_is_flag($str)
{
	if ($str === "/clear")
	{
		return (1);
	}
	else if ($str === "/unclear")
	{
		return (2);
	}
	else if (!strncmp($str, "/setcolor=", 10))
	{
		return (2);
	}
	else if ($str === "/joke")
	{
		return (3);
	}

	return (0);
}

if (file_exists($file))
{
	$fd = fopen($file, "r");
	if (flock($fd, LOCK_EX))
	{
		$messagedb = unserialize(file_get_contents($file));
		while ($i < count($messagedb))
		{
			if ($messagedb[$i]['msg'] == "/clear")
			{
				$clear++;
			}
			else if ($messagedb[$i]['msg'] == "/unclear")
			{
				$unclear++;
				$clear = 0;
			}
			else if (!strncmp($messagedb[$i]['msg'], "/setcolor=", 10))
			{
				$setcolor = 1;
				$color = substr($messagedb[$i]['msg'], 10);
			}
			$i++;
		}
		foreach ($messagedb as $message)
		{
			if ($clear > 0 && $message['msg'] == "/clear" && $unclear == 0)
			{
				$clear--;
			}
			else if ($message['msg'] == "/unclear" && $unclear > 0)
			{
				$unclear--;
			}
			else if ($clear == 0 && !ft_is_flag($message['msg']))
			{
				$color2 = $color; 
				if ($message['login'] !== "Console")
					echo "<small>" . date("d/m/y h:i", $message['time']) . "</small> ";
				else
					$color2 = "red";
				if ($setcolor == 1)
					echo "<span style='color:$color2'>";
				echo "<b>" . $message['login'] . "</b>: ";
				echo $message['msg'] . "<br />";
				if ($setcolor == 1)
					echo "</span>";
			}
		}
		flock($fd, LOCK_UN);
	}
	fclose($fd);
}
?>
