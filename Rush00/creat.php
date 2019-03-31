<?php 
	session_start();
?>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Localshop</title>
		<meta name="description" content="Mini site e-commerce">
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/menu.css"/>
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
				text-align:center;
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
	<header>
			<h1 style='padding-bottom:15px;' class="logo"><a href="index.php">LocalShop</a></h1>
	</header>
		<div class="boxe">
			<br>
			<h1>Création d'un utilisateur.</h1>
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
		<form method="post" action="create.php">
			Identifiant <input type="text" name="login" placeholder="enter your username"/>
			<br>
			Mot de passe <input type="password" name="passwd" placeholder="enter your password"/>
			<br>
			<input style='width:15%;' type="submit" name="submit" value="OK">
		</form>
		</div>
	</body>
</html>
