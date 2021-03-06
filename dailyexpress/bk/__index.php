<?php error_reporting(E_ALL ^ E_NOTICE);
/*****************************************************************
Created :26/10/2021
Author : worapot bhilarbutra (pros.ake)
E-mail : worapot.bhi@gmail.com
Website : https://www.vpslive.com
Copyright (C) 2021-2025, VPS Live Digital togethers all rights reserved.
 *****************************************************************/


include_once("../include/config.inc.php");
include_once("../include/class.inc.php");
include_once("../include/class.TemplatePower.inc.php");
include_once("../include/function.inc.php");

$tpl = new TemplatePower("../template/_tp_innerExpress.html");
$tpl->assignInclude("body", "_tp_index.html");
$tpl->prepare();
$tpl->assign("_ROOT.page_title", "ติดตามสินค้ารายวัน");
$tpl->assign("_ROOT.logo_brand_alt", $Brand);





// Search 
// Select Provider
// Select Day


$TodayThaiShow = ThaiToday($strDateTime, $tnow);
$no = 0;





$query = "SELECT * FROM `tb_DailyExpress`";
$result = $conn->query($query);
while ($line = $result->fetch_assoc()) {
    $no++;
    $tpl->newBlock("TRACKING");
    $tpl->assign("no", $no);
    $tpl->assign("date", ThaiDateShort($line['tdate'], false));

    $tpl->assign("ag_name", $line['ag_name']);
    $tpl->assign("ag_phone", $line['ag_phone']);
    $tpl->assign("cs_name", $line['cs_name']);
    $tpl->assign("cs_phone", $line['cs_phone']);


    if ($line['express_provider'] == 'FLA') {
        $tpl->assign("express_provider", "Flash Express");
        $tpl->assign("track_code", "<a href='https://www.flashexpress.co.th/tracking/?se=" . $line['track_code'] . "' target='_blank'>" . $line['track_code'] . "</a>");
    } elseif ($line['express_provider'] == 'KRY') {
        $tpl->assign("express_provider", "Kerry Express");
        $tpl->assign("track_code", "<a href='https://th.kerryexpress.com/th/track/?track=" . $line['track_code'] . "' target='_blank'>" . $line['track_code'] . "</a>");
    } else {
        $tpl->assign("express_provider", "ไปรษณีย์ไทย");
        $tpl->assign("track_code", "<a href='https://track.thailandpost.co.th/?trackNumber=" . $line['track_code'] . "' target='_blank'>" . $line['track_code'] . "</a>");
    }
}



$tpl->assign("_ROOT.TodayThaiShow", $TodayThaiShow);
$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();


/*
id
tdate
cs_name
cs_phone
ag_name
ag_phone
track_code
express_provider
COD
WALLET
status
*/