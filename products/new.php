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



$query = "SELECT * FROM `$tableProducts` ORDER BY `id` DESC";
$result = $conn->query($query);
if ($line = $result->fetch_assoc()) {
    $newid = $line['id'] + 1;

    if ($newid < 10) {
        $newcode = "PJR" . "000" . $newid;
    } else if ($newid < 100 and $newid >= 10) {
        $newcode = "PJR" . "00" . $newid;
    } else {
        $newcode = "PJR0" . $newid;
    }
}
$arrData = array();
$arrData['code']       = $newcode;
foreach ($arrData as $key => $value) {
    $arrFieldTmp[] = "`$key`";
    $arrValueTmp[] = "'$value'";
}
$strFieldTmp = implode(",", $arrFieldTmp);
$strValueTmp = implode(",", $arrValueTmp);
$query = "INSERT INTO `$tableProducts`($strFieldTmp) VALUES($strValueTmp)";
$result = $conn->query($query);

header('Location: index.php?ok');
exit;
