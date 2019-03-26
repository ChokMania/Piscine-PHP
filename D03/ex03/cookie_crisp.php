<?php
	if ($_GET["name"] && $_GET["action"] == "set")
		setcookie($_GET["name"], $_GET["value"], time() + 3600);
	else if ($_GET["name"] && $_GET["action"] == "get")
	{
		echo $_COOKIE[$_GET["name"]];
		if (strlen($_COOKIE[$_GET["name"]]))
			echo "\n";
	}
	else if ($_GET["name"] && $_GET["action"] == "del")
		setcookie($_GET["name"], NULL, -1);
?>