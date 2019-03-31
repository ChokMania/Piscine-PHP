<?php
	$value = array("0" => "root", "1" => "yolo");
	file_put_contents(".private/root", serialize($value));
?>