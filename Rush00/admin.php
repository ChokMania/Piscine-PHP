<?php
	session_start();
	function check($value){
		if (file_exists(".private/root"))
		{
			$users = unserialize(file_get_contents(".private/root"));
			if ($users)
				foreach($users as $id)
					if ($id == $value)
						return true;
		}
		return false;
	}
	if (!check($_SESSION['loggued_on_user']))
		header("Location: index.php");
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
				height: auto;
				min-width: 330px;
				margin-top: 20px;
				border-radius: 10px 10px;
				padding-bottom: 10px;
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
		<?php include("menu.php") ?>
		<div class="boxe">
			<br>
			<h1>Utilisateur</h1>
			<?php
				if ($_SESSION['ok'])
				{
					echo "<p style='color:green; text-align:center;'>" . $_SESSION['ok'] . "</p></center>";
					unset($_SESSION['ok']);
				}
				else if ($_SESSION['error'])
				{
					echo "<p style='color:red; text-align:center;'>" . $_SESSION['error'] . "</p></center>";
					unset($_SESSION['error']);
				}
			?>
			<form method="post" action="user.php">
				<label>Utilisateur à supprimer: </label><input type="text" name="user" placeholder="Entrez Ici" value="">
				<input style='width:20%' type="submit" name="submit" value="Supprimer">		
			</form>
			<form method="post" action="user.php">
				<label>Utilisateur à ajouter: </label><input type="text" name="user" placeholder="Entrez Ici" value="">
				<label>Mot de passe: </label><input type="text" name="ad_pw" placeholder="Entrez Ici" value="">
				<input style='width:20%' type="submit" name="submit" value="Ajouter">
			</form>
			<form method="post" action="user.php">
				<label>Utilisateur: </label><input type="text" name="user" placeholder="Entrez Ici" value="">
				<label>Mot de passe a modifer: </label><input type="text" name="mod_pw" placeholder="Entrez Ici" value="">
				<input style='width:20%' type="submit" name="submit" value="Modifier">
				<a href="./list.php"> Liste des Utilisateurs</a>
		</form>
		</div>
		<div class="boxe">
		<br>
			<h1>Articles/Categories</h1>	
		</div>
		<div class="boxe">
			<br>
			<h1>Commandes clients</h1>	
		</div>
	</body>
</html>
