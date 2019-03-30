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
	</head>
	<body id="home">
		<?php include("menu.php"); ?>
		<h1>Vos Articles</h1>
		<?php
			if ($_SESSION['article']) {
				$j = array_count_values(array_column($_SESSION['article'], 'name'));
				print_r($j);
				if ($j) {
					foreach ($_SESSION['article'] as &$produits) {
						$produits['nb'] = $j[$produits['name']];
					}
				}
				$tmp = array_map("unserialize", array_unique(array_map("serialize", $_SESSION['article'])));
				$tmp = array_values($tmp);
				$i = 0;
				foreach ($tmp as $produit) {
					echo '<p>' . $produit['name'] . '</p><br>';
					echo '<p>' . $produit['prix'] . '</p><br>';
					echo '<p>' . $produit['img'] . '</p><br>';
					echo '<p>' . $produit['nb'] . '</p><br>';
				}
				$_SESSION['nb_tot'] = count($_SESSION['article']);
			}
			else {
				echo "<p>Votre panier est vide, n'hesitez a aller faire quelques achats :)</p><br>";
			}
			?>
			<form method="post" action="savepanier.php">
			Archiver le panier<input type="submit" name="archiver" value="Valider">
		</form>
		</div>
	</body>
</html>