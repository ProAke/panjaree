<?php



//Items
$items = [
    'status' => 'all',
    'language' => 'TH',
    'barcode' => [
        'ED852942182TH', 'ED852942182TH', 'ED852942182TH', 'ED852942182TH'
    ]
];


$api_token_url = 'https://trackapi.thailandpost.co.th/post/api/v1/authenticate/token';
$api_track_url = 'https://trackapi.thailandpost.co.th/post/api/v1/track';
$token_key     = 'OuTlWpIqYmZKHUU:TBZ9SLT?D!KgX.FOSMAjMmCwGMK4YdKJNqX9V6SUC-K-X2IfC-NmR6DUH=SYTmBAV0SGJoCxGnCnBbNWLCHZ';

function api_request($url, $token, $content = null)
{

    $headers = [
        'Authorization: Token ' . $token,
        'Content-Type: application/json'
    ];

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



//Step1: GetToken()
$res_token = api_request($api_token_url, $token_key);


//Step2: GetItems()
$result = api_request($api_track_url, $res_token['token'], $items);


if (!is_null($result) && array_key_exists('response', $result)) {
    $response = $result['response'];
    if (!is_null($response) && array_key_exists('items', $response)) {
        foreach ($response['items'] as $key => $data) {
            echo $data['barcode'] . "\r\n";
            // อาจจะประยุกต็์วันลูป รายการ เพื่อบันทึกลงฐานข้อมูล ว่ามีรหัสใดบ้าง ที่เราขอรับข้อมูล จาก hook data
        }
    }
}
