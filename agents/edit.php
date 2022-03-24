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







if ($_POST['action'] == "save") {


    $sql = "UPDATE `$tableAgents` SET 
`ag_fullname`='" . $_POST['ag_fullname'] . "',
`ag_phone`='" . $_POST['ag_phone'] . "'                     
`ag_address`='" . $_POST['ag_address'] . "',
`ag_address`='" . $_POST['ag_'] . "'                     
 WHERE `id`=" . $_POST['id'];
    echo $sql;
    $result = $db->query($sql);
}















$tpl = new TemplatePower("../template/_tp_inner.html");
$tpl->assignInclude("body", "_tp_edit.html");
$tpl->prepare();
$tpl->assign("_ROOT.page_title", "แก้ไขข้อมูลตัวแทน");
$tpl->assign("_ROOT.logo_brand_alt", $Brand);


$TodayThaiShow = ThaiToday($strDateTime, $tnow);
$query = "SELECT * FROM `$tableAgents` WHERE `id` = '$_GET[id]'";
$result = $conn->query($query);
while ($line = $result->fetch_assoc()) {
    $no++;
    $tpl->newBlock("AGENT_EDIT");
    $tpl->assign("id", $line['id']);
    $tpl->assign("ag_id", $line['ag_id']);
    $tpl->assign("ag_fullname", $line['ag_fullname']);
    $tpl->assign("ag_linegroup", $line['ag_linegroup']);
    $tpl->assign("ag_phone", $line['ag_phone']);
    $tpl->assign("ag_email", $line['ag_email']);
    $tpl->assign("ag_address", $line['ag_address']);
    $tpl->assign("ag_province", $line['ag_province']);
    $tpl->assign("ag_zipcode", $line['ag_zipcode']);

    $tpl->assign("ag_office", $line['ag_office']);
    $tpl->assign("ag_office_address1", $line['ag_office_address1']);
    $tpl->assign("ag_facebook", $line['ag_facebook']);
    $tpl->assign("ag_line", $line['ag_line']);
    $tpl->assign("ag_website", $line['ag_website']);
    $tpl->assign("ag_logo", $line['ag_logo']);
    $tpl->assign("ag_status", $line['ag_status']);
    $tpl->assign("ag_create_date", $line['ag_create_date']);
    $tpl->assign("ag_update_date", $line['ag_update_date']);
    $tpl->assign("ag_create_by", $line['ag_create_by']);
    $tpl->assign("ag_update_by", $line['ag_update_by']);
    $tpl->assign("ag_remark", $line['ag_remark']);
    $tpl->assign("ag_status", $line['ag_status']);
    $tpl->assign("ag_avatar", $line['ag_avatar']);

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

    ag_office
    ag_office_address1
    ag_office_address2
    ag_office_district
    ag_office_subdistrict
    ag_office_province
    ag_office_zipcode

    status
    startdate
    tdate
*/
}
$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();
