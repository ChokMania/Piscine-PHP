<?php
	if ($_POST['login'] === NULL || $_POST['passwd'] === NULL || $_POST['login'] == ""
	|| $_POST['passwd'] === "" || $_POST['submit'] !== "OK") {
		exit ("ERROR\n");
	}
	if (!file_exists("../private"))
		@mkdir("../private");
	$login = $_POST["login"];
	$pwd = hash("sha512", $_POST["passwd"]);
	$new_user["login"] = $login;
	$new_user["passwd"] = $pwd;
	if (file_exists("../private/passwd"))
		$users = unserialize(file_get_contents("../private/passwd"));
	if ($users)
		foreach($users as $id)
			if ($id["login"] == $login)
				exit ("ERROR\n");
	$users[] = $new_user;
	file_put_contents("../private/passwd", serialize($users));
	header('Location: index.html');
	echo "OK\n";
?>