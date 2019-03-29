<?php
if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw']
	|| !$_POST['submit']|| !($_POST['submit'] === "OK"))
{
	exit ("ERROR\n");
}
$login = $_POST["login"];
$oldpw = hash("sha512", $_POST["oldpw"]);
$newpw = hash("sha512", $_POST["newpw"]);
if (file_exists("../private/passwd"))
{
	$users = unserialize(file_get_contents("../private/passwd"));
	if ($users)
	{
		$i = 0;
		foreach($users as $id)
		{
			if ($id["login"] == $login && $oldpw == $id["passwd"])
			{
				$users[$i]["passwd"] = $newpw;
				file_put_contents('../private/passwd', serialize($users));
				header("Location: http://localhost:8080/ex04/index.html");
				exit ("OK\n");
			}
			$i++;
		}
	}
}
exit ("ERROR\n");
?>
