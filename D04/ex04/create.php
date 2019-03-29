<?php
if (!$_POST['login'] || !$_POST['passwd']
	|| !$_POST['submit']|| !($_POST['submit'] === "OK"))
{
	exit ("ERROR\n");
}
$login = $_POST["login"];
$pwd = hash("sha512", $_POST["passwd"]);
if (file_exists("../private/passwd"))
{
	$users = unserialize(file_get_contents("../private/passwd"));
	if ($users)
	{
		foreach($users as $id)
			if ($id["login"] == $login)
				exit ("ERROR\n");
	}
}
if(!file_exists("../private"))
	mkdir("../private");
$new_user["login"] = $login;
$new_user["passwd"] = $pwd;
$users[] = $new_user;
file_put_contents("../private/passwd", serialize($users));
header("Location: http://localhost:8080/ex04/index.html");
echo "OK\n";
?>
