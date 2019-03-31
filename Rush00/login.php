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
		$_SESSION['error'] = "Mauvais identifiant ou mot de passe.";
		exit (header("Location: auth.php"));
	}
	else
		$_SESSION["loggued_on_user"] = $login;
	if ($_SESSION['log'] === "NON" && $_SESSION['VALIDER'] === "OUI")
	{
		$_SESSION['log'] = "OUI";
		exit (header("Location: savepanier.php"));
	}
	else
	{
		$_SESSION['VALIDER'] === "";
		$_SESSION['ok'] = "Connexion réussie.";
		exit(header("Location: index.php"));
	}
	print_r ($_SESSION);
	exit("OK\n");
?>