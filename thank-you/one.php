<?php
if (isset($_GET['link'])) {
  echo "<meta http-equiv=\"refresh\" content=\"0;url=https://" . $_GET['link'] . "/thank-you/two.php?pid=" . $_GET['pid'] . "&link=" . $_GET['link'] . "\">";
  // echo $_GET['link'];
} else {
  // Fallback behaviour goes here
  echo "<meta http-equiv=\"refresh\" content=\"0;url=https://google.com\">";
}
?>