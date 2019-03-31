<?php
session_start();
if (!$_POST['oldpw'] || !$_POST['newpw']
	|| !$_POST['submit']|| !($_POST['submit'] === "OK"))
{
	exit ("ERROR\n");
}
$login = $_SESSION["loggued_on_user"];
$oldpw = hash("sha512", $_POST["oldpw"]);
$newpw = hash("sha512", $_POST["newpw"]);
if (file_exists(".private/passwd"))
{
	$users = unserialize(file_get_contents(".private/passwd"));
	if ($users)
	{
		$i = 0;
		foreach($users as $id)
		{
			if ($id["login"] == $login && $oldpw == $id["passwd"])
			{
				$users[$i]["passwd"] = $newpw;
				file_put_contents('.private/passwd', serialize($users));
				$_SESSION['ok'] = "Mot de passe modifié.";
				exit(header("Location: index.php"));
			}
			$i++;
		}
	}
	$_SESSION['error'] = "Ancien mot de passe incorrect.";
	exit(header("Location: mod.php"));
}
?>