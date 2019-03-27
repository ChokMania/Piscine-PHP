<?php
	session_start();
	if ($_GET["submit"] == "OK") {
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
?>

<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Create account</title>
	</head>
	<body>
		<form method="get" action=".">
			Identifiant <input type="text" name="login" value ="<?php echo $_SESSION["login"] ?>" required/>
			<br>
			Mot de passe <input type="password" name="passwd" value = "<?php echo $_SESSION["passwd"] ?>" required/>
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>