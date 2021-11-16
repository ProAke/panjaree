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
$no = 1;

$query = "SELECT * FROM `tb_DailyExpress`";
$result = $conn->query($query);
while ($line = $result->fetch_assoc()) {
    $no++;
}




$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();
