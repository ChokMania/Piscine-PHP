<?php
function	auth($login, $passwd)
{
if (file_exists("../private/passwd"))
{
	$passwd = hash("sha512", $passwd);
	$users = unserialize(file_get_contents("../private/passwd"));
	if ($users)
	{
		foreach($users as $id)
		{
			if ($id["login"] == $login && $passwd == $id["passwd"])
			{
				return (TRUE);
			}
		}
	}
}
return (FALSE);
}
?>
