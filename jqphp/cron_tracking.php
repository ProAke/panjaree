<?php error_reporting(E_ALL ^ E_NOTICE);
/*****************************************************************
Created		: 21/10/2021
Author		: Ake.Worapot
E-mail		: worapot@yahoo.com
server		: www.vpslive.com
PHP Version : 7.0++
Copyright (C) 2010-2025, VPSLive Digital Together's , all rights reserved.
 *****************************************************************/

include_once("../include/config.inc.php");


// ทดสอบบันทึกข้อมูลทุกๆๆ 1 นาที
$arrData = array();

$arrData['action']     = "demo";
$arrData['note']       = "ทดสอบการเขียนข้อมูล";
$arrData['tdate']       = date("Y-m-d H:i:s");

foreach ($arrData as $key => $value) {
    $arrFieldTmp[] = "`$key`";
    $arrValueTmp[] = "'$value'";
}
$strFieldTmp = implode(",", $arrFieldTmp);
$strValueTmp = implode(",", $arrValueTmp);
$query = "INSERT INTO `$tableBotAction`($strFieldTmp) VALUES($strValueTmp)";
$result = $conn->query($query);

echo "200";
