#!/usr/bin/php
<?php
$value = array("0" => "root", "1" => "yolo");
	if (!file_exists('.private'))
		mkdir(".private");
	file_put_contents(".private/root", serialize($value));
	if (!file_exists('./database/'))
		mkdir("./database");
	$dbcat = "./database/categorie.csv";
	$dbfile = "./database/file.csv";

	$cate = array("Catégorie", "0");
	$lf = array("Lance-Flamme", "0");
	$car = array("Voiture", "0");
	$fusee = array("Fusee", "0");
	$cat = array($cate, $fusee, $car, $lf);
	$fd = fopen($dbcat, 'a');
	foreach ($cat as $elem)
		fputcsv($fd, $elem);
	fclose($fd);

	$desc = array("Nom, Descpription, Prix, Lien-Img, Categorie");
	$item1 = array("Dragon v2", "Petite fusée pour faire des petits voyages", "9.99", "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/SpaceX_Dragon_v2_%28Crew%29_unveiled_at_Hawthorne_facility_%2816581815487%29.jpg/800px-SpaceX_Dragon_v2_%28Crew%29_unveiled_at_Hawthorne_facility_%2816581815487%29.jpg", "Fusee");
	$item2 = array("Falcon Heavy", "Moyenne fusée pour faire des petits voyages", "59.99", "https://cdn.mos.cms.futurecdn.net/M62fUUTvHsPrmTwDCEvPH6.jpg", "Fusee");
	$item3 = array("Falcon 9", "Grande fusée pour faire des petits voyages", "99.99", "https://www.fromspacewithlove.com/wp-content/uploads/2018/05/falcon-9.png", "Fusee");
	$item4 = array("Not A Flamethrower", "", "599.99", "https://static1.squarespace.com/static/5915617137c58104451ac5fb/t/5c36e842f950b73359131b06/1547102286449/giphy.gif?format=500w", "Lance-Flamme");
	$item5 = array("Tesla Roadster", "", "299999.99", "https://www.challenges.fr/assets/img/2017/11/17/cover-r4x3w1000-5a0ef9e17e2f3-roadster-front-34-jpg.jpg", "Voiture");
	$item6= array("C_Two", "", "999999.99", "https://www.electrive.com/wp-content/uploads/2018/03/rimac-c-two-concept-car-genf-2018-06-888x444.png", "Voiture/Fusee");
	$items = array($desc, $item1, $item2, $item3, $item4, $item5, $item6);
	$fd = fopen($dbfile, 'a');
	foreach ($items as $elem)
		fputcsv($fd, $elem);
	fclose($fd);
?>
