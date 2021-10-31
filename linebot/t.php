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



if ($_GET['track']) {

    $arrData1 = array();
    $arrData1['CONTENTS']                    = $_GET['track'];
    $arrData1['TIMEPUT']                    = date("Y-m-d H:i:s");
    foreach ($arrData1 as $key => $value) {
        $arrFieldTmp[] = "`$key`";
        $arrValueTmp[] = "'$value'";
    }
    $strFieldTmp = implode(",", $arrFieldTmp);
    $strValueTmp = implode(",", $arrValueTmp);
    $query1 = "INSERT INTO `$tableLog`($strFieldTmp) VALUES($strValueTmp)";
    echo $query1;
    //$query1 = sqlCommandInsert($tableLog, $arrData1);
    $result1 = $conn->query($query1);

    echo "OK";
}



$tpl = new TemplatePower("_tp_t.html");
//$tpl->assignInclude("body", "_tp_index.html");
$tpl->prepare();




$tpl->printToScreen();
