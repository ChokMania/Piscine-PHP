<?php
session_start();
if (!$_POST['login'] || !$_POST['passwd']
	|| !$_POST['submit']|| !($_POST['submit'] === "OK"))
{
	$_SESSION['error'] = "Champ manquant.";
	exit (header("Location: creat.php"));
}
$login = $_POST["login"];
$pwd = hash("sha512", $_POST["passwd"]);
if (file_exists(".private/passwd"))
{
	$users = unserialize(file_get_contents(".private/passwd"));
	if ($users)
	{
		foreach($users as $id)
			if ($id["login"] == $login)
			{
				$_SESSION['error'] = "Utilisateur déjà existant.";
				exit (header("Location: creat.php"));
			}
	}
}
if(!file_exists(".private"))
	mkdir(".private");
$new_user["login"] = $login;
$new_user["passwd"] = $pwd;
$users[] = $new_user;
file_put_contents(".private/passwd", serialize($users));
$_SESSION['ok'] = "Utilisateur créé.";
exit(header("Location: auth.php"));
?>
