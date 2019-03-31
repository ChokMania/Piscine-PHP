<?php
session_start();
$i = 0;
foreach ($_SESSION["article"] as &$test)
{
	if ($test && $test["name"] === $_POST["name"])
	{
		unset($_SESSION["article"][$i]);
		$j++;
	}
	$i++;
}
$_SESSION["article"] = array_values($_SESSION["article"]);
header("Location: panier.php");
$_SESSION['nb_tot'] -= $j;
exit("OK");
?>