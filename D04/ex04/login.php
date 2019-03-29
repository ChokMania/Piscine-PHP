<?php

include	'auth.php';

$login = $_POST['login'];
$passwd = $_POST['passwd'];
session_start();
if (!auth($login, $passwd))
{
	$_SESSION["loggued_on_user"] = "";
	exit ("ERROR\n");
}
else
{
	$_SESSION["loggued_on_user"] = $login;

}
?>

<html>
	<body style='background-color:grey'>
		<a href="logout.php" style="float: right">Se déconnecter</a>
		<iframe style='background-color:lightgrey' name="chat" src="chat.php" width="100%" height="550px" scrolling="auto" frameborder="0" margin-top:-4px; margin-left:-4px;></iframe>
		<iframe style='background-color:white' name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
</html>
