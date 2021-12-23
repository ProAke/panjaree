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




//echo date("t", mktime(0, 0, 0, 11, 1, date("Y")));



foreach ($_POST as $key => $value) {
    $tpl->assign("_ROOT.{$key}", $value);
}

// this month
$day = 0;
if ($_GET['tday'] != "") {
    $today = $_GET['tday'];
} else {
    $today = date("y-m-d");
}


for ($i = 1; $i <= 31; $i++) {
    $day++;


    $tpl->newBlock("DayList");

    if ($day == $today) {
        $tpl->assign("ac", " active");
    }
    $tpl->assign("day", $day);
    $tpl->assign("url", "index.php?tday=" . "2021-12-" . $day);
}






$tpl->assign("_ROOT.TodayThaiShow", $TodayThaiShow);
$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();
