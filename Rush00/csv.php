<?php 
session_start();
$i;
if (!($_POST['submit'] === "Ajouter Produit") && !($_POST['submit'] === "Ajout Categorie")
&& !($_POST['submit'] === "Supp Categorie") && !($_POST['submit'] === "Supp Article"))
		exit(header("Location: admin.php"));
if (!(file_exists('database/categorie.csv')) || !(file_exists('database/file.csv')))
	{	
		$_SESSION['error'] = "Fichier(s) manquant(s).";
		exit(header("Location: admin.php"));
	}
if ($_POST['submit'] === "Ajouter Produit"){
	if (!$_POST['article'] || !$_POST['description'] || !$_POST['prix']
	|| !$_POST['image'] || !$_POST['categorie'])
	{
		$_SESSION['error'] = "Champ vide.";
		exit(header("Location: admin.php"));
	}
	$fp = fopen('database/file.csv', 'a');
	$list = array(array($_POST['article'], $_POST['description'], $_POST['prix'], $_POST['image'], $_POST['categorie']));
	foreach ($list as $fields) {
		fputcsv($fp, $fields);
	}
	fclose($fp);
}
if ($_POST['submit'] === "Ajout Categorie"){
	if ($_POST['ajout_cat'] === "")
	{
		$_SESSION['error'] = "Champ vide.";
		exit(header("Location: admin.php"));
	}
	$fp = fopen('database/categorie.csv', 'a');
	$list = array(array($_POST['ajout_cat'], '0'));
	foreach ($list as $fields) {
		fputcsv($fp, $fields);
	}
	fclose($fp);
}
if ($_POST['submit'] === "Supp Categorie") {
	if ($_POST['supp_cat'] === "")
	{
		$_SESSION['error'] = "Champ vide.";
		exit(header("Location: admin.php"));
	}
	$db = array_map('str_getcsv', file("database/categorie.csv"));
	foreach ($db as &$cat)
	{
		if ($_POST['supp_cat'] == $cat[0])
		{
			unset($db[$i]);
			$db	= array_values($db);
			break;
		}
		$i++;
	}
	$fp = fopen('database/categorie.csv', 'w');
	foreach ($db as $fields) {
		fputcsv($fp, $fields);
	}
	fclose($fp);
}
if ($_POST['submit'] === "Supp Article") {
	if ($_POST['supp_art'] === "")
	{
		$_SESSION['error'] = "Champ vide.";
		exit(header("Location: admin.php"));
	}
	$db = array_map('str_getcsv', file("database/file.csv"));
	foreach ($db as &$cat)
	{
		if ($_POST['supp_art'] == $cat[0])
		{
			unset($db[$i]);
			$db	= array_values($db);
			break;
		}
		$i++;
	}
	$fp = fopen('database/file.csv', 'w');
	foreach ($db as $fields) {
		fputcsv($fp, $fields);
	}
	fclose($fp);
}
exit(header("Location: admin.php"));
?>