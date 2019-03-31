<?php
session_start();
?>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Localshop</title>
		<meta name="description" content="Mini site e-commerce">
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="shortcut icon" href="#">
		<style>
		.boxe {
			position: relative;
			margin-left: auto;
			margin-right: auto;
			background-color: lightgrey;
			width: 50%;
			height: 25%;
			min-width: 330px;
			margin-top: 20px;
			border-radius: 10px 10px;
		}
		
		h1 {
			text-align: center;
			margin-top: -10px;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		form input{
			width: 300px;
		}
		</style>
	</head>
	<body>
		<?php include("menu.php"); ?>
		<div class="boxe">
			<br>
			<h1>Utilisateur</h1>
			<form method="post" action="user.php">
			<label>Utilisateur à supprimer: </label><input type="text" name="user" placeholder="Entrez Ici" value="">
			<form>
			<form method="post" action="user.php">
			<label>Utilisateur à ajouter: </label><input type="text" name="user" placeholder="Entrez Ici" value="">
			<form>
			<form method="post" action="user.php">
			<label>Utilisateur: </label><input type="text" name="id" placeholder="Entrez Ici" value="">
			<label>Old mot de passe: </label><input type="text" name="oldpw" placeholder="Entrez Ici" value="">
			<label>New mot de passe: </label><input type="text" name="newpw" placeholder="Entrez Ici" value="">
			<form>
		</div>
		<div class="boxe">
		<br>
			<h1>Articles/Categories</h1>	
		</div>
		<div class="boxe">
			<br>
			<h1>Commandes</h1>	
		</div>
	</body>
</html>
