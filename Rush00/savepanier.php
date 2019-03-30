<?php
	session_start();
	$_SESSION['VALIDER'] = "OUI";
	if (empty($_SESSION['loggued_on_user']))
	{
		$_SESSION['log'] = "NON";
		header("Location: http://localhost:8080/auth.php");
		exit("ERROR");
	}
	if ($_SESSION['nb_tot'] !== "0" ){
		$users = unserialize(file_get_contents(".private/passwd"));
		$i = 0;
		foreach($users as $id)
		{
			if ($id["login"] == $_SESSION['loggued_on_user'])
			{
				$users[$i]["article"][] = $_SESSION['article'];
				file_put_contents('.private/passwd', serialize($users));
				header("Location: http://localhost:8080/index.php");
				unset($_SESSION['article']);
				array_values($_SESSION);
				$_SESSION['nb_tot'] = "0";
				$_SESSION['VALIDER'] = "";
				exit("OK");
			}
			$i++;
		}
	}
$_SESSION['VALIDER'] = "";
header("Location: http://localhost:8080/index.php");
?>
