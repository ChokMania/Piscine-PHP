<?php
	if ((isset($_POST['login']) && $_POST['login'] != NULL) &&
	(isset($_POST['oldpw']) && $_POST['oldpw'] != NULL) &&
	(isset($_POST['newpw']) && $_POST['newpw'] != NULL) &&
	(isset($_POST['submit']) && $_POST['submit'] === "OK")){
		echo "ERROR\n";
		return ;
	}
	$user = unserialize(file_get_contents('../private/passwd'));
	if ($user) {
		foreach ($user as $k => $v) {
			if ($v['login'] === $_POST['login'] && $v['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
				$user[$k]['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($user));
				echo "OK\n";
				return;
			}
		}
	}
	echo "ERROR\n";
?>