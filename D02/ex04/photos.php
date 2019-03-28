#!/usr/bin/php
<?php
	function ft_curl($url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_HEADER, FALSE);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_REFERER, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, TRUE);
		$html = curl_exec($curl);
		curl_close($curl);
		return ($html);
	}

	if ($argc < 2)
		return (0);
	$url = $argv[1];
	if (strncmp($url, "http://", 7) != 0
	&& strncmp($url, "https://", 8) != 0 )
		return (0);
	$html= ft_curl($url);
	if (!preg_match_all('/<img src\=["\'](?P<src>(.*)(?:jpe?g|png|svg|gif))["\'](.*)>/' , $html, $srcs))
		return (0);
	$saving_dir = basename($url);
	if (!file_exists($saving_dir))
		mkdir ($saving_dir);
	foreach ($srcs[src] as $src)
		{
			if (strpos($src, 'http') === false)
				$src = $url . '/' . $src;
			$url_to_image = $src;
			$filename = basename($url_to_image);
			$complete_save_loc = $saving_dir . "/" . $filename;
			file_put_contents($complete_save_loc, file_get_contents($url_to_image));
		}
?>