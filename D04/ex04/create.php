<?php
	function in_array_r($needle, $haystack) {
		foreach ($haystack as $item)
			if ($item == $needle || (is_array($item) && in_array_r($needle, $item)))
				return true;
		return false;
	}
	if (!$_POST || !isset($_POST['submit']) || $_POST['submit'] !== "OK")
		exit("ERROR\n");
	if (!isset($_POST['login']) || empty($_POST['login']) || !isset($_POST['passwd']) || empty($_POST['passwd']))
		exit("ERROR\n");
	$users = @file_get_contents('../private/passwd');
	if (!$users) {
		$users = [];
		mkdir('../private');
	}
	else
		$users = unserialize($users);
	if (in_array_r($_POST['login'], $users))
		exit("ERROR\n");
	$users[] = [
		'login' => $_POST['login'],
		'passwd' => hash('sha512', $_POST['passwd'])
	];
	file_put_contents('../private/passwd', serialize($users));
	header('Location: index.html');
	echo "OK\n";
?>