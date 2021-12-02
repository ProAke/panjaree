<?php
//include_once("../include/config.inc.php");
//include_once("../include/class.inc.php");
//include_once("../include/function.inc.php");

header('Content-Type: application/json; charset=utf-8');
$api_token_url = 'https://trackapi.thailandpost.co.th/post/api/v1/authenticate/token';
$api_track_url = 'https://trackapi.thailandpost.co.th/post/api/v1/track';
$token_key     = 'OuTlWpIqYmZKHUU:TBZ9SLT?D!KgX.FOSMAjMmCwGMK4YdKJNqX9V6SUC-K-X2IfC-NmR6DUH=SYTmBAV0SGJoCxGnCnBbNWLCHZ';



$trackid = $_GET['tk'];


function api_request($url, $token, $content = null)
{

    $headers = array(
        'Authorization: Token ' . $token,
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($content));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

$items = "[
'status' => 'all',
'language' => 'TH',
'barcode' => ['EG955963096TH'] // บันทัดนี้ barcode มันต้องเป็น array จริงหรือเปล่า
]";


echo $items . "<br>\n";

$res_token = api_request($api_token_url, $token_key);
$res_items = api_request($api_track_url, $res_token['token'], json_encode($items));
print_r($res_items); //ผลลัพธ์

echo "--------------------";
