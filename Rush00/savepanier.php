<?php
	session_start();
	$_SESSION['VALIDER'] = "OUI";
	if ($_SESSION['nb_tot'] === "0")
	{
		$_SESSION['VALIDER'] = "";
		header("Location: auth.php");
		exit("ERROR");
	}
	if (empty($_SESSION['loggued_on_user'] || $_SESSION['loggued_on_user'] === ""))
	{
		$_SESSION['log'] = "NON";
		header("Location: auth.php");
		exit("ERROR");
	}
	if ($_SESSION['nb_tot'] !== "0"){
		if (file_exists(".private/panier"))
			$users = unserialize(file_get_contents(".private/panier"));
		if ($users) {
			foreach($users as &$id) {
				if ($id['login'] === $_SESSION['loggued_on_user']) {
					$id['article'][time()] = $_SESSION['article'];
					file_put_contents('.private/panier', serialize($users));
					header("Location: index.php");
					unset($_SESSION['article']);
					array_values($_SESSION);
					$_SESSION['nb_tot'] = "0";
					$_SESSION['VALIDER'] = "";
					exit("OK");
				}
				$i++;
			}
		}
		$new_user["login"] = $_SESSION['loggued_on_user'];
		$new_user["article"][time()] = $_SESSION['article'];
		$users[] = $new_user;
		file_put_contents('.private/panier', serialize($users));
		unset($_SESSION['article']);
		array_values($_SESSION);
		$_SESSION['nb_tot'] = "0";
	}
$_SESSION['VALIDER'] = "";
header("Location: index.php");
exit("OK");
?>
