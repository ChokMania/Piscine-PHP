#!/usr/bin/php
<?PHP
	function	ft_error($error)
	{
		if ($error == 0)
			echo "Usage : ./photos.php 'website url'.\n";
		if ($error == -1)
			echo "Bad input.\n";
		if ($error == -2)
			echo "Bad input or no image to download in the website.\n";
	}

	if ($argc < 2)
		return (ft_error(0));
	$url = $argv[1];
	if (strncmp($url, "http://", 7) != 0
		&& strncmp($url, "https://", 8) != 0 )
		return (ft_error(-1));
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_REFERER, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	$html = curl_exec($curl);
	curl_close($curl);
	if (!preg_match_all('/<img src\="(?P<src>(.*)(?:jpe?g|png|svg|gif))"(.*)>/'
		, $html, $srcs))
		return (ft_error(-2));
	$saving_dir = basename($url);
	if (!file_exists($saving_dir))
		mkdir ($saving_dir);
	foreach ($srcs[1] as $src)
	{
		if (strpos($src, 'http') === false)
			$src = $url . '/' . $src;
		$url_to_image = $src;
		$filename = basename($url_to_image);
		$complete_save_loc = $saving_dir . "/" . $filename;
		file_put_contents($complete_save_loc, file_get_contents($url_to_image));
	}
?>