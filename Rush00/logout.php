<?php
session_start();
session_unset($_SESSION);
$_SESSION['loggued_on_user'] == "";
$_SESSION['nb_tot'] = "0";
header("Location: http://localhost:8080/index.php");
?>
