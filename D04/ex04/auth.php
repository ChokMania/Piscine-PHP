<?php
	function auth($login, $passwd) {
		if (!$login || !$passwd || $login === "" || $passwd === "")
			return false;
		if (!file_exists('../private/passwd'))
		{
			if (!file_exists("../private"))
				mkdir('../private');
			return false;
		}
		$user = unserialize(file_get_contents('../private/passwd'));
		if ($user) {
			foreach ($user as $id) {
				if ($id['login'] === $login && $id['passwd'] === hash('sha512', $passwd))
					return true;
			}
		}
		return false;
	}
?>