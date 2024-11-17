<?php    
	if ((!isset($referer)) or ($referer == "")) {
		echo "<meta http-equiv=\"refresh\" content=\"0;url=https://" . $_GET['link'] . "/thank-you/three.html?pid=" . $_GET['pid'] . "\">";
	}
?>