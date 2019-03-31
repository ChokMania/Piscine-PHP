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
		<style>
		p {
			font-size: 20px;
			margin-left: 10px;
		}
		td {
			border: 2px solid grey;
		}
		#imge {
			width: 30vmax;
			height: auto;
		}

		input[type=image] {
			border: 0;
			display: block;
			width: 70px;
			height: auto;
			margin-left: 10px;
		}
		#panier {
			width: 70px;
			height: auto;
		}
		</style>
	</head>
	<body id="home">
		<?php include("menu.php"); ?>
		<center><table>
			<thead>
				<h1>Articles Disponibles dans la categorie : Fusée</h1>
			</thead>
			<tbody>
				<tr>
					<th> <img id="imge" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/SpaceX_Dragon_v2_%28Crew%29_unveiled_at_Hawthorne_facility_%2816581815487%29.jpg/800px-SpaceX_Dragon_v2_%28Crew%29_unveiled_at_Hawthorne_facility_%2816581815487%29.jpg" /><br></th> 
					<td><h1>Dragon v2</h1><p>Petite fusée pour faire des petits voyages<br>Prix: 9.99 euros</p>
					<form method="post" action=panieradd.php>
						<input type="hidden" name="name" value="Dragon v2"></input>
						<input type="hidden" name="prix" value="9.99"></input>
						<input type="hidden" name="img" value="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/SpaceX_Dragon_v2_%28Crew%29_unveiled_at_Hawthorne_facility_%2816581815487%29.jpg/800px-SpaceX_Dragon_v2_%28Crew%29_unveiled_at_Hawthorne_facility_%2816581815487%29.jpg"></input>
						<input type="image" src="https://pngimage.net/wp-content/uploads/2018/06/logo-panier-png-1.png" name="submit" value="OK">
					</form>
				</td>
				</tr>
				<tr>
					<th> <img id="imge" src="https://cdn.mos.cms.futurecdn.net/M62fUUTvHsPrmTwDCEvPH6.jpg" /><br></th> 
					<td><h1>Falcon Heavy</h1><p>Moyenne fusée pour faire des petits voyages<br>Prix: 59.99 euros</p>
					<form method="post" action=panieradd.php>
						<input type="hidden" name="name" value="Falcon Heavy"></input>
						<input type="hidden" name="prix" value="59.99"></input>
						<input type="hidden" name="img" value="https://cdn.mos.cms.futurecdn.net/M62fUUTvHsPrmTwDCEvPH6.jpg"></input>
						<input type="image" src="https://pngimage.net/wp-content/uploads/2018/06/logo-panier-png-1.png" name="submit" value="OK">
					</form>
				</td>
				</tr>
				<tr>
					<th> <img id="imge" src="https://www.fromspacewithlove.com/wp-content/uploads/2018/05/falcon-9.png" /><br></th> 
					<td><h1>Falcon 9</h1><p>Grande fusée pour faire des petits voyages<br>Prix: 99.99 euros</p>
					<form method="post" action=panieradd.php>
						<input type="hidden" name="name" value="Falcon 9"></input>
						<input type="hidden" name="prix" value="99.99"></input>
						<input type="hidden" name="img" value="https://www.fromspacewithlove.com/wp-content/uploads/2018/05/falcon-9.png"></input>
						<input type="image" src="https://pngimage.net/wp-content/uploads/2018/06/logo-panier-png-1.png">
					</form>
				</td>
			</tr>
			</tbody>
		</table>
		</center>
		<footer>
		</footer>
		</div>
	</body>
</html>

