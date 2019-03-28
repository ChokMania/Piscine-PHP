#!/usr/bin/php 
<?PHP
	function up_1($str) {
		return strtoupper($str[0]);
	}

	function up_2($str) {
		return preg_replace_callback('/>.*</sU', up_1, $str[0]);
	}

	function up_3($str) {
		return  'title="' . strtoupper($str[1]) .'"';  
	}
	if ($argc != 2)
		return ;
	$result = file_get_contents($argv[1]);
	$result = preg_replace_callback('/title="(.*?)"/', up_3, $result);
	$result = preg_replace_callback('/<a [^>]+.*<\/a>/sU', up_2, $result);
	print $result;
?>