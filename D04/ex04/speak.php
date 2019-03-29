<?php

session_start();
$file = "../private/chat";
if ($_POST && $_POST['msg'] && $_POST['submit'] == "OK"
	&& $_SESSION["loggued_on_user"] != "")
{
	$login = $_SESSION["loggued_on_user"];
	$message = $_POST["msg"];
	$time = time();
	if (file_exists($file))
	{
		$messagedb = unserialize(file_get_contents($file));
	}
	else
	{
		file_put_contents("$file", "");
	}
	$new_message["login"] = $login;
	$new_message["time"] = $time;
	$new_message["msg"] = $message;
	if ($new_message["msg"] === "/joke")
	{
		$new_message['login'] = "Console";
		$new_message['msg'] = ft_joke();
	}
	$messagedb[] = $new_message;
	$fd = fopen($file, "w");
	if (flock($fd, LOCK_EX))
	{
		file_put_contents($file, serialize($messagedb));
		flock($fd, LOCK_UN);
	}
	fclose($fd);
}

function	ft_joke()
{
	$rand = rand(0, 3);
	if ($rand == 0)
		$joke = "Quelle mamie fait peur aux voleurs ?<br />Mamie Traillette";
	if ($rand == 1)
		$joke = "J'ai une blague sur les magasins<br />Mais elle a pas supermarché";
	if ($rand == 2)
		$joke = "Pourquoi est-ce c'est difficile de conduire dans le Nord ?<br />Parce que les voitures arrêtent PAS DE CALER";
	if ($rand == 3)
		$joke = "Comment est-ce que la chouette sait que son mari fait la gueule ?<br />Parce qu’HIBOUDE";
	return ($joke);
}
?>

<html lang="fr">
<head>
</head>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
		<form method="post" action="">
			<input style='width:50%; height:100%' type="text" name="msg" autofocus placeholder="Ecrire ici"/>
			<input style='width:50px; height:30px'type="submit" name="submit" value="OK">
		</form>
</html>
