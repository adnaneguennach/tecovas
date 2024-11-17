<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$access_token = "none";
$pixel_id = "none";
$url = "https://website.com";
$test_event_code = "none";

if ($access_token != "none") {
  $fbc = "none";
  $ip = $_SERVER['REMOTE_ADDR'];
  if (isset($_SESSION['fbc'])) { $fbc = $_SESSION['fbc']; }
  else {
    $db = json_decode(file_get_contents("db.txt"), true);
    if (isset($db[$ip])) {
      $fbc = $db[$ip];
    }
  }

  if ($fbc != "none") {
    $data = [
      [
        "event_name" => "Purchase",
        "event_time" => time(true),
        "user_data" => [
          "client_ip_address" => $_SERVER['REMOTE_ADDR'],
          "client_user_agent" => $_SERVER['HTTP_USER_AGENT'],
          "fbc" => $fbc
        ],
        "custom_data" => [
          "currency" => "usd",
          "value" => 123.45
        ],
        "event_source_url" => $url."/thank-you/index.php",
        "action_source" => "website"
      ]
    ];

    $json = json_encode($data);

    #$payload = "data=".$json."&access_token=".$access_token."&test_event_code=".$test_event_code;
    $payload = "data=".$json."&access_token=".$access_token;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://graph.facebook.com/v11.0/$pixel_id/events");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close ($ch);
  }
}

else {
  ?>
  <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo $_GET['pid']; ?>');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=<?php echo $_GET['pid']; ?>&ev=Purchase&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
  <?php
}

?>
