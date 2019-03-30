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
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
</html>
