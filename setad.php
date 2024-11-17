<?php
	if (isset($_REQUEST['headline'])) {
		$name = $_REQUEST['headline'];
		$nameescaped = preg_replace("/\"/", "&quot;", $name);


		$index = file_get_contents("index.html");

		$index = preg_replace("/<title>(.+?)<\/title>/si", "<title>".$name."</title>", $index);
		$index = preg_replace("/class=\"product-title m-0 p-0\"(\s*)>(.+?)<\//si", "class=\"product-title m-0 p-0\">".$name."</", $index);
		$index = preg_replace("/content=\"([^>]*?)\"(\s+)name=\"description\"/si", 'content="'.$nameescaped.'" name="description"', $index);

		$index = preg_replace("/content=\"([^>]*?)\"(\s+)property=\"og:title\"/si", 'content="'.$nameescaped.'" property="og:title"', $index);



		if (isset($_REQUEST['body'])) {
			$body = $_REQUEST['body'];
			$bodyescaped = preg_replace("/\"/", "&quot;", $body);
			$index = preg_replace("/class=\"details1\"(\s*)>(.*?)<\//si", "class=\"details1\">".$body."</", $index);
			$index = preg_replace("/content=\"([^>]*?)\"(\s+)property=\"og:description\"/si", 'content="'.$bodyescaped.'" property="og:description"', $index);
		}

		if (isset($_REQUEST['image'])) {
			$image = $_REQUEST['image'];
			$path = "images/".time(true).".".get_file_extension($image);
			grab_image($image, $path);

			$index = preg_replace("/id=\"mainImg\" src=\"(.+?)\"/si", "id=\"mainImg\" src=\"$path\"", $index);
			$index = preg_replace("/alt=\"b1\" src=\"(.+?)\"/si", "alt=\"b1\" src=\"$path\"", $index);
			$index = preg_replace("/content=\"([^>]*?)\"(\s+)property=\"og:image\"/si", 'content="https://'.$_SERVER[HTTP_HOST]."/".$path.'" property="og:image"', $index);
		}

		echo $index;
		file_put_contents("index.html", $index);

	}


	function grab_image($url, $saveto) {
	    $ch = curl_init ($url);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	    $raw=curl_exec($ch);

	    curl_close ($ch);
	    if(file_exists($saveto)){
	        unlink($saveto);
	    }
	    $fp = fopen($saveto,'x');
	    fwrite($fp, $raw);
	    fclose($fp);
	}

	function get_file_extension($file_name) {
		if (preg_match("/\.(png|jpg|jpeg|gif|bmp|mp4)/", $file_name)) {
			return substr(strrchr($file_name,'.'), 1);
		}
	    return "png";
	}

?>