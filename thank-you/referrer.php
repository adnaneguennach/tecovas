<?php
	
	session_start();
	
	if (isset($_SERVER['REMOTE_ADDR'])) {
		$ip = $_SERVER['REMOTE_ADDR'];
		file_put_contents("log.txt", date('Y-m-d H:i:s')." -- referrer.php -- ".$ip, FILE_APPEND);

		// Get lookup table
		$db = json_decode(file_get_contents("db.txt"), true);

		// If no value for this ip, then record everything
		$value = (isset($db[$ip])) ? $db[$ip] : 'none';

		if ($value == 'none') {

			// Construct hash of GET params
			$getparams = [];
			if (isset($_SERVER['HTTP_REFERER'])) {
				$uricmp = explode("?", $_SERVER['HTTP_REFERER']);
				if (isset($uricmp[1])) {
					$getparamscmp = explode("&", $uricmp[1]);
					foreach ($getparamscmp as $g) {
						$gcmp = explode("=", $g);
						$getparams[$gcmp[0]] = $gcmp[1];
					}
				}
			}

			// Construct fbc value
			$fbc = 'none';
			if (isset($getparams['fbclid'])) {
				$fbc = "fb.1.".time(true)."000.".$getparams['fbclid'];
			}
			
			// Write to db and session
			$db[$ip] = $fbc;
			file_put_contents("db.txt", json_encode($db));
			file_put_contents("log.txt", " -- FBC:".$fbc, FILE_APPEND);
			$_SESSION['fbc'] = $fbc;
		}
		file_put_contents("log.txt", "\n", FILE_APPEND);

		/*
		file_put_contents("log.txt", "\n".json_encode($_SERVER)."\n".json_encode($_COOKIE)."\n\n", FILE_APPEND);
		if (!isset($_COOKIE['fbc'])) {

			$getparams = [];
			if (isset($_SERVER['HTTP_REFERER'])) {
				$uricmp = explode("?", $_SERVER['HTTP_REFERER']);
				if (isset($uricmp[1])) {
					$getparamscmp = explode("&", $uricmp[1]);
					foreach ($getparamscmp as $g) {
						$gcmp = explode("=", $g);
						$getparams[$gcmp[0]] = $gcmp[1];
					}
				}
			}

			$fbclid = (isset($getparams['fbclid'])) ? $getparams['fbclid'] : "test";
			$fbc = "fb.1.".time(true)."000.".$fbclid;
			setcookie("fbc", $fbc, time() + (86400 * 30), "/");
			file_put_contents("log.txt", "FBC - $fbc \n\n", FILE_APPEND);
		}
		*/
	}

	

?>