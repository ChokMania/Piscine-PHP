<?php
	session_start();
	header("content-type: text/plain");
	while ($_POST['nb'] > 0)
	{
		$_SESSION['article'][] = ['name' => $_POST["name"], 'prix' => $_POST["prix"], 'img' => $_POST["img"]];
		$_POST['nb']--;
	}
	$login = $_SESSION['loggued_on_user'];
	$_SESSION['nb_tot'] = count($_SESSION['article']);
	header("Location: index.php?cat=" . $_SESSION['get']);
	$_SESSION['get'] = "";
?>