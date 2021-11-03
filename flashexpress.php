
<?php
header('Content-Type:application/json');
$url = "https://www.flashexpress.co.th/tracking/?se=TH273221W9AN2D";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$res = curl_exec($ch);
curl_close($ch);

echo $res;

?>