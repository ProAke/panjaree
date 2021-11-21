<?php
include_once("../include/config.inc.php");
include_once("../include/class.inc.php");
include_once("../include/function.inc.php");

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
    //echo $response;

    $fxdata = json_decode($response, true);
    //echo $code;
    $pno = $fxdata['message']['list'][0]['pno'];
    //$state1 = $fxdat['message']['list'][0]['routes'][0]['message'];
    // $state2 = $fxdat['message']['list'][0]['routes'][1]['message'];
    // $state3 = $fxdat['message']['list'][0]['routes'][3]['message'];

    echo "TRACKING No: " . $pno . "\n";


    $i = 0;


    while ($i < count($fxdata['message']['list'][0]['routes'])) {
        $state = $fxdata['message']['list'][0]['routes'][$i]['message'];
        $routed_at = $fxdata['message']['list'][0]['routes'][$i]['routed_at'];
        // echo $state . "-->" . $routed_at . "\n";
        $i++;

        // state ล่าสุด
        


    }

    $a = $i - 1;
    $finalState = $fxdata['message']['list'][0]['routes'][$a]['message'];
    $finalRouted_at = $fxdata['message']['list'][0]['routes'][$a]['routed_at'];
    echo "สินค้าอยู่ที่ > " . $state . " รับมาเมื่อ : " . $routed_at . "\n";
}
