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

$tpl = new TemplatePower("../template/_tp_inner.html");
$tpl->assignInclude("body", "_tp_index.html");
$tpl->prepare();
$tpl->assign("_ROOT.page_title", "ตัวแทน");
$tpl->assign("_ROOT.logo_brand_alt", $Brand);


$TodayThaiShow = ThaiToday($strDateTime, $tnow);

$TodayThaiShow = ThaiToday($strDateTime, $tnow);


$query = "SELECT * FROM `$tableOrders`";
$result = $conn->query($query);
while ($line = $result->fetch_assoc()) {
    $no++;
    $tpl->newBlock("AGENTS_ALL");

    $tpl->assign("id", $line['id']);
    //$tpl->assign("order_date", $line['order_tdate']);
    $tpl->assign("order_date", ThaiDateShort($line['order_tdate'], false));
    $tpl->assign("agent", $line['ag_name'] . "<br>" . $line['ag_phone']);
    $tpl->assign("customer", $line['cs_name'] . "<br>" . $line['cs_phone']);
    $tpl->assign("tracking_code", $line['tracking_code']);
}

$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();
