<?php
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
					return (TRUE);
				}
			}
		}
	}
	return (FALSE);
	}
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	session_start();
	if (!auth($login, $passwd))
	{
		$_SESSION["loggued_on_user"] = "";
		exit ("ERROR\n");
	}
	else
		$_SESSION["loggued_on_user"] = $login;
	$_SESSION['nb_tot'] = "0";
	header("Location: http://localhost:8080/index.php");
?>