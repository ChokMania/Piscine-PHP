<?php
	session_start();
	require 'auth.php';
	$_SESSION['loggued_on_user'] = "";
	if (!$_POST['login'] || $_POST['login'] === "" || !$_POST['passwd']
	|| !$_POST['passwd'] || !auth($_POST['login'], $_POST['passwd']))
		exit ("ERROR\n");
	$_SESSION['loggued_on_user'] = $_POST['login'];
?>

<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>42chat</title>
	</head>
	<body>
		<h1>
			42chat
		</h1>
		<a href="logout.php" style="float: right">Se déconnecter</a>
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
</html>