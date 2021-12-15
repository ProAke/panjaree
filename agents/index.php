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


$query = "SELECT * FROM `$tableAgents` ORDER BY `id` DESC";
$result = $conn->query($query);
while ($line = $result->fetch_assoc()) {
    $no++;
    $tpl->newBlock("AGENTS_ALL");
    $tpl->assign("no", $no);
    $tpl->assign("id", $line['id']);
    $tpl->assign("ag_fullname", $line['ag_fullname']);


    /*
    id
    ag_id
    ag_linegroup
    ag_fullname
    ag_phone
    ag_avatar
    ag_lineid
    ag_lineOA
    ag_facebookid
    ag_facebookPage
    ag_ig
    ag_tiktok
    ag_youtube
    ag_website
    ag_shopname
    ag_address1
    ag_address2
    ag_district
    ag_subdistrict
    ag_province
    ag_zipcode
    status
    startdate
    tdate
*/
}

$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();
