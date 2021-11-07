<?php


header('Content-Type: application/json; charset=utf-8');
//$trackid = 'TH381422KDQ10A';
$trackid = $_GET['tk'];
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.flashexpress.co.th/tools/get-route/",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"search\"\r\n\r\n${trackid}\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
CURLOPT_HTTPHEADER => array(
"cache-control: no-cache",
"content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
"postman-token: ac00b464-45c3-2c24-a5b4-7f1b6d2c01c2"
),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
}