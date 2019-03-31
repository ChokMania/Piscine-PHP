<?php
session_start();
session_unset($_SESSION);
$_SESSION['loggued_on_user'] == "";
$_SESSION['nb_tot'] = "0";
$_SESSION['log'] = "NON";
header("Location: index.php");
?>
