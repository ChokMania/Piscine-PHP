<?php
session_start();
$i = 0;
foreach ($_SESSION["article"] as &$test)
{
	if ($test && $test["name"] === $_POST["name"])
	{
		unset($_SESSION["article"][$i]);
		break ;
	}
	$i++;
}
$i = 0;
$_SESSION["article"] = array_values($_SESSION["article"]);
foreach ($_SESSION["article"] as &$teste)
{
	if ($teste && $teste["name"] === $_POST["name"])
		$_SESSION['article'][$i]['nb'] = intval($_SESSION['article'][$i]['nb']) - 1;
	$i++;
}
$_SESSION['nb_tot'] -= 1;
header("Location: panier.php");
exit("OK");
?>