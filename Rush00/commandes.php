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
			<?php
	date_default_timezone_set("Europe/Paris");
	if (!($_POST['submit'] === "OK"))
		exit(header("Location: admin.php"));
	if (!(file_exists('.private/panier'))) {
		echo "<p style='color:red; text-align:center;'> Utilisateur introuvable.</p><br><center><a href='./admin.php'>Retour </a></center>";
		exit();
	}
	$users = unserialize(file_get_contents(".private/panier"));
	$login = $_POST["login"];
	foreach($users as $id) {
		if ($id["login"] === $login)
		{
			echo "<center><h1>Achat de l'utilisateur : " . $login . "</h1>";
			foreach ($id['article'] as $key=>$time) {
				echo "<br><b>Le " . date("d-m-Y à H:i:s", $key) . "<br></b>";
				foreach ($time as $value)
				{
					echo $value['name'] .  " ======> " . $value['prix'] . " euros <br>";
					$i += $value['prix'];
				}
				echo '<br>Somme Totale : ' . $i . " euros.<br><br>";
				$exist = 1;
			}
		}
		$i++;
	}
	if ($exist != 1)
	{
		echo "<p style='color:red; text-align:center;'> Utilisateur introuvable.</p>";
	}
?>
<center><a href="./admin.php"> Retour </a></center>
</div>
</body>
</html>