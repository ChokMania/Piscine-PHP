<?php
	session_start();
	header("content-type: text/plain");
	$_SESSION['article'][] = ['name' => $_POST["name"], 'prix' => $_POST["prix"], 'img' => $_POST["img"]];
	$login = $_SESSION['loggued_on_user'];
	$_SESSION['nb_tot'] = count($_SESSION['article']);
	header("Location: panier.php");
?>