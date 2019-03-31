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
				height: auto;
				min-width: 330px;
				margin-top: 20px;
				border-radius: 10px 10px;
				padding-bottom: 20px;
				padding-top: 15px;
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
		<br>
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
		<div class="boxe">
			<br>
			<h1>Modification du mot de passe</h1>
			<form method="post" action="modif.php">
			Ancien mot de passe :<input type="password" name="oldpw" placeholder="enter your actual password"/>
			Nouveau mot de passe :<input type="password" name="newpw" placeholder="enter your new password"/>
			<br>
			<input style='width:20%;' type="submit" name="submit" value="OK">
		</form>
		</div>
		<div class="boxe">
			<br>
			<h1>Suppression du compte.</h1>
			<form method="post" action="sup.php">
			Mot de passe :<input type="password" name="pwd" placeholder="enter your password"/>
			<br>
			<input style='width:20%;' type="submit" name="submit" value="OK">
		</form>
		</div>
	</body>
</html>