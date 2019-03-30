<?php
if ($_POST['login'] === "" || $_POST['oldpw'] === "" || $_POST['newpw'] === ""
|| $_POST['submit'] !== "OK" || !file_exists("../private") || !file_exists("../private/passwd"))
	exit("ERROR\n");
$file = unserialize(file_get_contents("../private/passwd"));
$modif = FALSE;
foreach ($file as $k => $v)
	if ($v['login'] === $_POST['login']
	&& $v['passwd'] === hash("sha512", $_POST['oldpw']) && ($modif = TRUE))
		$file[$k]['passwd'] = hash("sha512", $_POST['newpw']);
if (!$modif)
	exit("ERROR\n");
file_put_contents("../private/passwd", serialize($file));
echo "OK\n";
?>
