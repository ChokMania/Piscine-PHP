#!/usr/bin/php
<?php
	$value = array("0" => "root", "1" => "yolo");
	file_put_contents(".private/root", serialize($value));
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
	$item1 = array("Dragon v2", "Petite fusée pour faire des petits voyages", "9.99 euros", "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/SpaceX_Dragon_v2_%28Crew%29_unveiled_at_Hawthorne_facility_%2816581815487%29.jpg/800px-SpaceX_Dragon_v2_%28Crew%29_unveiled_at_Hawthorne_facility_%2816581815487%29.jpg", "Fusee");
	$item2 = array("Falcon Heavy", "Moyenne fusée pour faire des petits voyages", "59.99 euros", "https://cdn.mos.cms.futurecdn.net/M62fUUTvHsPrmTwDCEvPH6.jpg", "Fusee");
	$item3 = array("Falcon 9", "Grande fusée pour faire des petits voyages", "99.99", "https://www.fromspacewithlove.com/wp-content/uploads/2018/05/falcon-9.png", "Fusee");
	$items = array($desc, $item1, $item2, $item3);
	$fd = fopen($dbfile, 'a');
	foreach ($items as $elem)
		fputcsv($fd, $elem);
	fclose($fd);
?>