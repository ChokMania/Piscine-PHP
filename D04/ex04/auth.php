<?php
	function auth($login, $passwd) {
		if (!$login || !$passwd || $login === "" || $passwd === "")
			return false;
		if (!file_exists('../private/passwd'))
		{
			mkdir('../private');
			return false;
		}
		$user = unserialize(file_get_contents('../private/passwd'));
		if ($user) {
			foreach ($user as $k => $v) {
				if ($v['login'] === $login && $v['passwd'] === hash('sha512', $passwd))
					return true;
			}
		}
		return false;
	}
?>