<?php

if ($_POST["login"] === "" || $_POST["passwd"] === "") {
	echo "ERROR\n";
	exit (1);
}
if (!file_exists("./private"))
	mkdir("private");
$login = $_POST["login"];
$pwd = hash("whirlpool", $_POST["passwd"]);
$new_user["login"] = $login;
$new_user["passwd"] = $pwd;
if (file_exists("./private/passwd"))
	$users = unserialize(file_get_contents("./private/passwd"));
if ($users)
	foreach($users as $id)
		if ($id["login"] == $login) {
			echo "ERROR\n";
			exit (1);
		}
$users[] = $new_user;
file_put_contents("./private/passwd", serialize($users));
echo "OK\n";
?>
