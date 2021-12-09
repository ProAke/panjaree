<?php
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
include_once("../include/config.inc.php");
include_once("../include/class.inc.php");
include_once("../include/function.inc.php");

header('Content-Type: application/json; charset=utf-8');


$query1 = "SELECT * FROM `tb_DailyExpress` WHERE `status` = '1' AND `provider`='FLA'";
$result1 = $conn->query($query1);


//START LOOP
while ($line1 = $result1->fetch_assoc()) {

    $trackid1 = $line1['code'];
    $trackid = trim($trackid1);
    $sql2 = "UPDATE tb_DailyExpress SET `code`= '" . $trackid . "' WHERE `id`='" . $line1['id'] . "'";
    $conn->query($sql2);
    ///////////////////////////////////////////////////
    echo $trackid;
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
        //echo "TRACKING No: " . $pno . "\n";


        $i = 0;
        echo " num:" . count($fxdata['message']['list'][0]['routes']);

        while ($i < count($fxdata['message']['list'][0]['routes'])) {
            $state = $fxdata['message']['list'][0]['routes'][$i]['message'];
            $routed_at = $fxdata['message']['list'][0]['routes'][$i]['routed_at'];
            //echo $state . "-->" . $routed_at . "\n";
            $i++;

            $sql = "SELECT * FROM `$tableTrackLog` WHERE `track_code` = '" . $trackid . "' AND `state` = '" . $state . "'  AND `tdate` = '" . $routed_at . "' ";
            $query = $conn->query($sql) or die($conn->error);
            $t = $query->num_rows;
            if ($t == 0) {
                $sql = "INSERT INTO `$tableTrackLog` (`provider`, `track_code`, `state`, `tdate`) VALUES ('FLA','" . $trackid . "', '" . $state . "', '" . $routed_at . "')";
                $query = $conn->query($sql) or die($conn->error);
            }
        }

        $a = 0;
        $finalState = $fxdata['message']['list'][0]['routes'][0]['message'];
        $finalRouted_at = $fxdata['message']['list'][0]['routes'][0]['routed_at'];
        // echo "-----------------------------------------------------------------\n";
        // echo "สินค้าอยู่ที่ > " . $finalState . " รับมาเมื่อ : " . $finalRouted_at . "\n";
        //echo "-----------------------------------------------------------------\n";
        $statenow = " : สินค้าอยู่ที่ > " . $finalState . " รับมาเมื่อ : " . $finalRouted_at;


        $findword = "นำส่งสำเร็จ";
        $chk = strpos($finalState, $findword);
        if ($chk !== FALSE) {
            $sql = "UPDATE tb_DailyExpress SET `state`= '" . $finalRouted_at . "<br>" . $finalState . "', `status`= '3' WHERE `code`='" . $trackid . "'";
        } else {
            $sql = "UPDATE tb_DailyExpress SET `state`= '" . $finalRouted_at . "<br>" . $finalState . "' WHERE `code`='" . $trackid . "'";
        }





        $result = $conn->query($sql);
    }
    //END LOOP  ///////////////////////////////////////
    //echo  $statenow . "" . "\n";
    $i++;
}
header('Location: index.php');
exit;
