<?php
session_start();
if ($_SESSION['VALIDER'] === "OUI")
	$_SESSION['nb_tot'] = "0";
?>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Localshop</title>
		<meta name="description" content="Mini site e-commerce">
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="shortcut icon" href="#">
	</head>
	<body>
		<?php include 'menu.php' ?>
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
		<?php include 'menu2.php' ?>
	</body>
</html>

