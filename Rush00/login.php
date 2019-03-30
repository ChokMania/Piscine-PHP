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
		exit ("ERROR\n");
	}
	else
		$_SESSION["loggued_on_user"] = $login;
	if ($_SESSION['log'] === "NON" && $_SESSION['VALIDER'] === "OUI")
	{
		$_SESSION['log'] = "OUI";
		header("Location: http://localhost:8080/savepanier.php");
		exit("ICI\n");
	}
	else {
		$_SESSION['nb_tot'] = "0";
		header("Location: http://localhost:8080/index.php");
	}
	exit("OK\n");
?>