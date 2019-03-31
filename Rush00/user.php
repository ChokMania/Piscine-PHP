<?php 
session_start();
if (!($_POST['submit'] === "Supprimer") && !($_POST['submit'] === "Ajouter") 
    && !($_POST['submit'] === "Modifier"))
        exit(header("Location: index.php"));
if ($_POST['user'] == "")
{
    $_SESSION['error'] = "Champ vide.";
    exit(header("Location: admin.php"));
}
$login = $_POST['user'];
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
                if ($_POST['submit'] === "Supprimer")
                {
                    if ($id['login'] === $_SESSION['loggued_on_user'])
                    {
                        $_SESSION['error'] = "Vous utilisez actuellement cet utilisateur.";
			    	    exit(header("Location: admin.php"));
                    }
                    else
                    {
                        unset($users[$i]);
                        $users = array_values($users);
                        file_put_contents('.private/passwd', serialize($users));
                        $_SESSION['ok'] = "Utilisateur supprimé.";
                        exit(header("Location: admin.php"));
                    }
                }
                if ($_POST['submit'] === "Modifier")
                {
                    if ($_POST['mod_pw'] === "")
                    {
                        $_SESSION['error'] = "Champ vide.";
                        exit(header("Location: admin.php"));
                    }
                    $mod_pw = hash("sha512", $_POST["mod_pw"]);
                    $users[$i]["passwd"] = $mod_pw;
			    	file_put_contents('.private/passwd', serialize($users));
                    $_SESSION['ok'] = "Mot de passe modifié.";
                    exit(header("Location: admin.php"));
                }
                else
                $_SESSION['error'] = "Utilisateur déjà existant.";
                exit(header("Location: admin.php"));
            }
            $i++;
        }
        if ($_POST['submit'] === "Ajouter")
        {
            if ($_POST['ad_pw'] === "")
            {
                $_SESSION['error'] = "Champ vide.";
                exit(header("Location: admin.php"));
            }
            $ad_pw = hash("sha512", $_POST["ad_pw"]);
            $new_user["login"] = $login;
            $new_user["passwd"] = $ad_pw;
            $users[] = $new_user;
            file_put_contents(".private/passwd", serialize($users));
            $_SESSION['ok'] = "Utilisateur ajouté.";
            exit(header("Location: admin.php"));
        }
        else 
        {
            $_SESSION['error'] = "Utilisateur non existant.";
            exit(header("Location: admin.php"));
        }
	}
}
?>