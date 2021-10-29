<?php error_reporting(E_ALL ^ E_NOTICE);
/*****************************************************************
Created :26/10/2021
Author : worapot bhilarbutra (pros.ake)
E-mail : worapot.bhi@gmail.com
Website : https://www.vpslive.com
Copyright (C) 2021-2025, VPS Live Digital togethers all rights reserved.
 *****************************************************************/
include_once("../include/config.inc.php");


/*Get Data From POST Http Request*/
$datas = file_get_contents('php://input');
/*Decode Json From LINE Data Body*/
$deCode = json_decode($datas, true);

file_put_contents('log/log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

$replyToken = $deCode['events'][0]['replyToken'];
$userId = $deCode['events'][0]['source']['userId'];
$userName = $deCode['events'][0]['source']['displayName'];
$text = $deCode['events'][0]['message']['text'];





// บอทตอบ///////////////////////
$messages = [];
$messages['replyToken'] = $replyToken;
//$messages['messages'][0] = getFormatTextMessage("อยู่ค่ะ" . $userName . "จะถามอะไรจ๊ะ");
$messages['messages'][0] = getFormatTextMessage("นี่ลิ้งติดตาม https://www.flashexpress.co.th/tracking/?se=TH273221W9AN2D");
/*
$datas = [];
//$datas['replyToken'] = $replyToken;
$datas["type"] = "flex";
$datas["altText"] = "ปัณณ์จรีย์ ติดตามสินค้า";
$datas["contents"]["type"] = "template";
$datas["contents"]["altText"] = "ปัณณ์จรีย์ ติดตามสินค้า FlasExpress : TH273221W9AN2D";
$datas["contents"]["template"]["type"] = "carousel";
$datas["contents"]["template"]["imageSize"] = "cover";
$datas["contents"]["template"]["columns"][0]["thumbnailImageUrl"] = "https://panjaree.uarea.in/linebot/img/flashexpressflex.jpg";
$datas["contents"]["template"]["columns"][0]["title"] = "ปัณณ์จรีย์ ติดตามสินค้า";
$datas["contents"]["template"]["columns"][0]["text"] = "ส่งสินค้าแล้วทาง Flash Express คลิ๊กที่เลขพัสดุ";
$datas["contents"]["template"]["columns"][0]["actions"][0]["type"] = "uri";
$datas["contents"]["template"]["columns"][0]["actions"][0]["label"] = "TH273221W9AN2D";
$datas["contents"]["template"]["columns"][0]["actions"][0]["uri"] = "https://www.flashexpress.co.th/tracking/?se=TH273221W9AN2D";
$datas["contents"]["template"]["columns"][0]["imageBackgroundColor"] = "#FDCE00";
//$dataPushMessages['url'] = "https://api.line.me/v2/bot/message/push";
//$dataPushMessages['token'] = "<access token>";
//$messages['to'] = "<user id>";
$messages['messages'][] = $datas;
$encodeJson = json_encode($messages);
//sentMessage($encodeJson,$dataPushMessages);
*/





$encodeJson = json_encode($messages);
$LINEDatas['url'] = "https://api.line.me/v2/bot/message/reply";
$LINEDatas['token'] = "PipIwu3mnNEqEtvNFle3e1SwXnBhU/9VOKvm3X7T0Rwa5QFTZzVK3PDWfcjaqq1qwA5T0O1wpr0KHuootMeArUg8LFAJEuM9groAcBqcsf5oIstDSWUH+6W1m+aYOCSilMtGxr3ugzp/xxWhFOTaZAdB04t89/1O/w1cDnyilFU=";
$results = sentMessage($encodeJson, $LINEDatas);
/*Return HTTP Request 200*/
http_response_code(200);

function getFormatTextMessage($text)
{
    $datas = [];
    $datas['type'] = 'text';
    $datas['text'] = $text;

    return $datas;
}

function sentMessage($encodeJson, $datas)
{
    $datasReturn = [];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $datas['url'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $encodeJson,
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer " . $datas['token'],
            "cache-control: no-cache",
            "content-type: application/json; charset=UTF-8",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        $datasReturn['result'] = 'E';
        $datasReturn['message'] = $err;
    } else {
        if ($response == "{}") {
            $datasReturn['result'] = 'S';
            $datasReturn['message'] = 'Success';
        } else {
            $datasReturn['result'] = 'E';
            $datasReturn['message'] = $response;
        }
    }

    return $datasReturn;
}
