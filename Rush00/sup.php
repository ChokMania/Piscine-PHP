<?php 
session_start();
if (!($_POST['submit'] === "OK"))
        exit(header("Location: index.php"));
$pw = hash("sha512", $_POST["pwd"]);
$login = $_SESSION['loggued_on_user'];
if (file_exists(".private/passwd"))
{
	$users = unserialize(file_get_contents(".private/passwd"));
	if ($users)
	{
		$i = 0;
		foreach($users as $id)
		{
        
			if ($id["login"] === $login)
			{
                if ($id['passwd'] === $pw)
                {
                    unset($users[$i]);
                    $users = array_values($users);
                    file_put_contents('.private/passwd', serialize($users));
                    session_unset($_SESSION);
                    $_SESSION['ok'] = "Utilisateur supprimé.";
                    exit(header("Location: logout.php"));
                }
            }
            $i++;
        }
        $_SESSION['error'] = "Mauvais mot de passe.";
        exit(header("Location: mod.php"));
    }
}