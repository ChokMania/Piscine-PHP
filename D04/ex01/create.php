<?php
if ($_POST['login'] === "" || $_POST['passwd'] === "" || $_POST['submit'] !== "OK")
	exit("ERROR\n");
if (!file_exists("../private"))
	mkdir("../private");
if (file_exists("../private/passwd")) {
	$file = unserialize(file_get_contents("../private/passwd"));
	foreach ($file as $value)
		if ($value["login"] === $_POST["login"])
			exit("ERROR\n");
}
$user["login"] = $_POST["login"];
$user["passwd"] = hash("sha512", $_POST["passwd"]);
$file[] = $user;
file_put_contents("../private/passwd", serialize($file));
echo "OK\n";
?>
