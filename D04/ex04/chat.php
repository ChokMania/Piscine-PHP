<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Paris');
			if (!file_exists('../private/chat')) {
				file_put_contents('../private/chat', serialize([]));
			}
			$fd = fopen('../private/chat', 'r');
			$messages = [];
			if (flock($fd, LOCK_SH)) {
				$messages = unserialize(file_get_contents('../private/chat'));
				if (!$messages)
					$messages = [];
				flock($fd, LOCK_UN);
			}
			fclose($fd);
			foreach ($messages as $i)
				echo "<small>" . date('H:i d/m/y', $i['time']) . "</small> . <b>{$i['login']}:</b> {$i['msg']}<br>";
		?>
	</body>
</html>