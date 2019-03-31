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
			background-color: lightgrey;
			width: 500px;
			height: 200px;
			box-shadow: 5px 5px lightblue;
			}
		h3{
			text-align: center;
		}

		p {
			margin-left: 270px;
		}
		img {
			float: left;
			margin-top: 16px;
			width : 250px;
		}
		input[type=submit] {
			padding:5px 15px; 
			-webkit-border-radius: 5px;
			border-radius: 5px; 
		}
		input[type=image] {
			width: 15px;
			float: right;
			margin-right: 5px;
			margin-top: -20px;
		}
		#moins {
			width: 20px;
			margin-top: -46px;
			margin-right: 30px;
		}
		#plus {
			width: 16px;
			margin-top: -44px;
		}
		</style>
	</head>
	<body>
		<?php include("menu.php"); ?>
		<h1>Vos Articles</h1>
		<?php
			if ($_SESSION['article']) {
				$j = array_count_values(array_column($_SESSION['article'], 'name'));
				if ($j) {
					foreach ($_SESSION['article'] as &$produits) {
						$produits['nb'] = $j[$produits['name']];
					}
				}
				$tmp = array_map("unserialize", array_unique(array_map("serialize", $_SESSION['article'])));
				$tmp = array_values($tmp);
				$i = 0;
				foreach ($tmp as $produit) {
					echo '<div class="boxe">
					<img src="'. $produit['img'] . '"><br>
					<form method="post" action=deleteall.php>
						<input type="hidden" name="name" value="' . $produit["name"]. '"></input>
						<input type="image" src="http://www.icone-png.com/png/25/24717.png">
					</form>
					<h3>' . $produit["name"] . '</h3><br>
					<p>' . $produit["prix"] . '€ x ' . $produit["nb"] . '
					<form method="post" action=deleteone.php>
						<input type="hidden" name="name" value="' . $produit["name"]. '"></input>
						<input type="image" id="moins" src="http://www.icone-png.com/png/16/16345.png">
					</form>
					<form method="post" action=addone.php>
						<input type="hidden" name="name" value="' . $produit["name"]. '"></input>
						<input type="hidden" name="prix" value="' . $produit["prix"]. '"></input>
						<input type="hidden" name="img" value="' . $produit["img"]. '"></input>
						<input type="image" id="plus" src="http://www.icone-png.com/png/30/29881.png">
					</form>
					</p>
					<p>Total pour cet article : ' . $produit["prix"] * $produit["nb"] . '€</p><br>
					</div><br>';
				}
				foreach ($_SESSION['article'] as $prix)
					$k += $prix['prix'];
				if ($k !== "0")
					echo' <h2>Total : ' . $k . '€';
				$_SESSION['nb_tot'] = count($_SESSION['article']);
				echo '<form method="post" action="savepanier.php">';
				echo '<input type="submit" name="archiver" value="ARCHIVER">';
				echo '</form></h2>';
			}
			else {
				echo "<p>Votre panier est vide, n'hesitez a aller faire quelques achats :)</p><br>";
			}
			?>
		</div>
	</body>
</html>
