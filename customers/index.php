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
$tpl->assign("_ROOT.page_title", "ลูกค้าทั้งหมด");
$tpl->assign("_ROOT.logo_brand_alt", $Brand);


$TodayThaiShow = ThaiToday($strDateTime, $tnow);


$query = "SELECT * FROM `$tableCustomers` ORDER BY `id` DESC";
$result = $conn->query($query);
while ($line = $result->fetch_assoc()) {
    $no++;
    $tpl->newBlock("CUSTOMERS");

    $tpl->assign("id", $line['ID']);
    $tpl->assign("customer_code", $line['CUSTOMER_CODE']);
    $tpl->assign("customer_level", $line['CUSTOMER_LEVEL']);
    $tpl->assign("customer_name", $line['CUSTOMER_NAME']);
    $tpl->assign("customer_phone", $line['CUSTOMER_PHONE']);

    if ($line['SUBDISTRICT'] != "") {
        $subdistrict = " ต. " . $line['SUBDISTRICT'];
    }

    if ($line['PROVINCE'] != "") {
        $tpl->assign("customer_address", $line['ADDRESS1'] . $line['ADDRESS2'] . $subdistrict . " อ. " . $line['DISTRICT'] . " จ. " . $line['PROVINCE'] . " " . $line['ZIPCODE']);
    } else {
        $tpl->assign("customer_address", $line['ADDRESS1']);
    }
}
$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();


/*ID
CUSTOMER_CODE
CUSTOMER_LEVEL
CUSTOMER_NAME
CUSTOMER_SEX
CUSTOMER_PHONE
CUSTOMER_EMAIL
CUSTOMER_LINEID
CUSTOMER_FACEBOOKID
CUSTOMER_IG
CUSTOMER_TIKTOK
CUSTOMER_JOBTYPE
ADDRESS1
ADDRESS2
SUB_DISTRICT
DISTRICT
PROVINCE
ZIPCODE
TDATE
STATUS
*/