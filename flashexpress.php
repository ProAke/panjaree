<?php
header('Content-Type:application/json');
$url = "https://www.flashexpress.co.th/tracking/?se=TH340120CJA04B";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$res = curl_exec($ch);
curl_close($ch);


$dom = new DomDocument();
@$dom->loadHTML($res);


$classname = "res-info-div res-info-div-1";
$finder = new DomXPath($dom);
$div = $finder->query("//div[@class="head"]");
$val = $div->item(0)->textContent;
echo $title . ' ' . substr($val, 0) . '<br>';
