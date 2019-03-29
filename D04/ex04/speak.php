<?php
session_start();
if ($_POST && isset($_POST['msg']) && $_POST['msg'] != "" && isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "") {
	if (!file_exists('../private/chat')) {
		if (!is_dir('../private'))
			mkdir('../private');
		file_put_contents('../private/chat', serialize([]));
	}
	$fd = fopen('../private/chat', 'r+');
	if (flock($fd, LOCK_EX)) {
		$messages = unserialize(file_get_contents('../private/chat'));
		if (!$messages)
			$messages = [];
		$tmp['login'] = $_SESSION['loggued_on_user'];
		$tmp['time'] = time();
		$tmp['msg'] = $_POST['msg'];
		$messages[] = $tmp;
		file_put_contents('../private/chat', serialize($messages));
		flock($fd, LOCK_UN);
	}
	fclose($fd);
}
?>

<html>
	<head>
	</head>
	<body>
		<script language="javascript">
			top.frames['chat'].location = 'chat.php';
		</script>
		<form action="" method="post">
			<input type="text" name="msg" placeholder="Message">
			<button type="submit">Envoyer le message</button>
		</form>
	</body>
</html>