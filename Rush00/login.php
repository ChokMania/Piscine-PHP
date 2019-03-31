<?php
	session_start();
	function	auth($login, $passwd)
	{
	if (file_exists(".private/passwd"))
	{
		$passwd = hash("sha512", $passwd);
		$users = unserialize(file_get_contents(".private/passwd"));
		if ($users)
		{
			foreach($users as $id)
			{
				if ($id["login"] == $login && $passwd == $id["passwd"])
				{
					if ($id["login"] === "root")
						$_SESSION['root'] = "1";
					return (TRUE);
				}
			}
		}
	}
	return (FALSE);
	}
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	if (!auth($login, $passwd))
	{
		
		$_SESSION["loggued_on_user"] = "";
		$_SESSION['VALIDER'] === "";
		exit ("ERROR\n");
	}
	else
		$_SESSION["loggued_on_user"] = $login;
	if ($_SESSION['log'] === "NON" && $_SESSION['VALIDER'] === "OUI")
	{
		$_SESSION['log'] = "OUI";
		header("Location: savepanier.php");
		exit("ICI\n");
	}
	else {
		$_SESSION['VALIDER'] === "";
		header("Location: index.php");
	}
	print_r ($_SESSION);
	exit("OK\n");
?>