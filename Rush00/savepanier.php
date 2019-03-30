<?php
	session_start();
	if (!($_POST['archiver'] === "Valider"))
		exit ("ERROR\n");
	if (empty($_SESSION['loggued_on_user']))
	{
		header("Location: http://localhost:8080/auth.php");
		exit("QUIT");
	}
	else if ($_SESSION['nb_tot'] !== "0" ){
		$users = unserialize(file_get_contents(".private/passwd"));
		$i = 0;
		foreach($users as $id)
		{
			if ($id["login"] == $_SESSION['loggued_on_user'])
			{
				$users[$i]["article"][] = $_SESSION['article'];
				file_put_contents('.private/passwd', serialize($users));
				header("Location: http://localhost:8080/index.php");
				print_r($users[$i]["article"]);
				unset($_SESSION['article']);
				$_SESSION['nb_tot'] = "0";
				print_r($_SESSION);
				exit("OK");
			}
			$i++;
		}
	}
header("Location: http://localhost:8080/index.php");
?>
