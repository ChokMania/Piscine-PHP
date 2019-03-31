<?php
session_start();
$_SESSION['db']['cat'] = array_map('str_getcsv', file("./database/categorie.csv"));
$_SESSION['db']['items'] = array_map('str_getcsv', file("./database/file.csv"));

function display_item($item)
{
	echo '
	<tr>
		<th> <img id="imge" src="' . $item[3] . '" /><br></th> 
		<td><h1>' . $item[0] . '</h1><p>' . $item[1] . '<br>Prix: ' . $item[2]. ' euros</p>
		<form method="post" action=panieradd.php>
			<input type="hidden" name="name" value="' . $item[0] . '"></input>
			<input type="hidden" name="prix" value="' . $item[2] . '"></input>
			<input type="hidden" name="img" value="' . $item[3] . '"></input>
			<input type="text" name="nb" value=""></input>
			<input type="image" src="https://pngimage.net/wp-content/uploads/2018/06/logo-panier-png-1.png" name="submit" value="OK">
		</form>
		</td>
	</tr>';
}

function display_cat()
{
	echo '<center><table>
	<thead>
		<h1>Articles Disponibles</h1>
	</thead>
	<tbody>';
	foreach($_SESSION['db']['items'] as $item)
	{
		if ($j++ != 0)
		{
			$cat = explode('/', $item[4]);
			$i = array_search($_GET['cat'], $cat);
			$_SESSION['get'] = $_GET['cat'];
			if (is_int($i))
				display_item($item);
			}
	}
	echo '</tbody>
	</table>
	</center>';
}
?>

<html>
	<head>
		<link rel="stylesheet" href="css/panier.css"/>
		<style>
			ul{
				list-style: none;
			}

			.cattitle{
				border: 3px solid;
				border-radius: 5px;
				height: 35px;
				width: 300px;
				margin-top: -10px;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.cat a{
				color: black;
				text-decoration: none;
				border: 3px solid;
				border-radius: 5px;
				height: 20px;
				width: 200px;
				margin-top: 5px;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.cat a:hover{
				color: white;
				background-color: black;
				border: 3px solid black;
			}

			.niveau2{
				display: none;
			}

			#catmenu .niveau1 li.sous-menu:hover .niveau2{
				display: block;
			}
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
	<body>
		<div id="catmenu">
			<ul class="niveau1">
				<li class="sous-menu"><span class=cattitle>Cat&eacute;gories</span>
					<center><ul class="niveau2">
					<?php
						$i = 0;
						foreach ($_SESSION['db']['cat'] as $elem) {
							if ($i++ != 0)
								echo "<li class=\"cat\"><a href=\"./?cat=$elem[0]\" />$elem[0]</a></li>";
						}
					?>
					</ul>
				</li></center>
			</ul>
		</div>
		<?php
			if ($_GET['cat'])
				display_cat();
		?>
	</body>
</html>
