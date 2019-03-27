<?php
	if ($_POST['login'] == NULL || $_POST['oldpw'] == NULL || 
		$_POST['newpw'] == NULL || $_POST['submit'] !== "OK"){
		echo "ERROR\n";
		return ;
		}
	$user = unserialize(file_get_contents('../private/passwd'));
	if ($user) {
		foreach ($user as $k => $v) {
			if ($v['login'] === $_POST['login'] && $v['passwd'] === hash('sha512', $_POST['oldpw'])) {
				$user[$k]['passwd'] = hash('sha512', $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($user));
				echo "OK\n";
				return;
			}
		}
	}
	echo "ERROR\n";
?>