<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>pseudo class :target</title>
		<link rel="stylesheet" href="css/menu.css"/>
	</head>
	<body>
		<header>
			<h1 class="logo"><a href="index.php">LocalShop</a></h1>
			<a class="to_nav" href="#menu">Menu</a>
			<form action="" id="menu">
				<fieldset>
					<nav id="primary_nav">
					<ul>
						<div style="font-size:15px">
							<?php
							include 'function.php';
							if (!$_SESSION["loggued_on_user"]) {
								echo '<li><a href="auth.php">Login</a></li>';
							}
							else {
								echo '<li><a href="modif.html">Compte</a></li>';
								echo '<li><a href="logout.php">Logout</a></li>';
								if (check_root($_SESSION["loggued_on_user"]))
									echo '<li><a href="admin.php">Admin</a></li>';
							}
							?>
							<li><a href="panier.php"><span class="price">
							<?php echo $_SESSION['nb_tot'];?></span> Panier
							<?php
								if ($_SESSION['article']){
									echo '<span class="price">';
									foreach ($_SESSION['article'] as $prix)
									$i += $prix['prix'];
									echo $i . "€";
								}
								?>
							</span>
						</a></li>
						<a href="#" id="fermer">fermer</a>
						</div>
					</ul>
					</nav>
				</fieldset>
			</form>
		</header>
	</body>
</html>