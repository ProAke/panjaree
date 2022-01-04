<?php

$api_token_url = 'https://trackapi.thailandpost.co.th/post/api/v1/authenticate/token';
$api_track_url = 'https://trackapi.thailandpost.co.th/post/api/v1/track';
$token_key = ' COHXP2M!FcYFV0PjUVKnXMW;CqI+YUDTD#APAfNBNcT&RQP$TJN+V$UHHMU_UoI?QKQ8ApU4N3YhJLUwRuOlU9NSO|I:WgEYX+G&';

function api_request($url, $token, $content = null){

$headers = array(
'Authorization: Token '. $token,
'Content-Type: application/json'
);
//echo"$headers";
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($content) );
curl_setopt( $ch, CURLOPT_POST, true );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec( $ch );
curl_close($ch);

return json_decode($result, true);
}
$items = "[
'status' => 'all',
'language' => 'TH',
'barcode' => [
' RE461746287TH'
]
]";

$res_token = api_request($api_token_url, $token_key);
$res_items = api_request($api_track_url, $res_token['token'], $items);
print_r($res_items); //ผลลัพธ์
