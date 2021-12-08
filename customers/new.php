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
include_once("../include/function.inc.php");

$action = isset($_POST['action']) ? $_POST['action'] : '';


header('Location: index.php?error');
exit;

if ($action == 'new') {


    $sql = "SELECT * FROM `$tableCustomers`";
    $query = $conn->query($sql) or die($conn->error);
    $num = $query->num_rows;
    $Year = date("Y") + 543;
    $Nyear = substr($Year, -2);
    // Create Customer code
    $customer_code = "CSPJR" . $Nyear . sprintf("%04d", $num + 1);




    $arrData = array();
    $arrData['CUSTOMER_CODE']       = $customer_code;
    $arrData['CUSTOMER_NAME']       = $_POST['cs_name'];
    $arrData['CUSTOMER_ADDRESS']    = $_POST['cs_address'];
    $arrData['CUSTOMER_PHONE']      = $_POST['cs_phone'];
    $arrData['TDATE'] = date("Y-m-d H:i:s");

    foreach ($arrData as $key => $value) {
        $arrFieldTmp[] = "`$key`";
        $arrValueTmp[] = "'$value'";
    }
    $strFieldTmp = implode(",", $arrFieldTmp);
    $strValueTmp = implode(",", $arrValueTmp);
    $query = "INSERT INTO `$tableCustomers`($strFieldTmp) VALUES($strValueTmp)";
    $result = $conn->query($query);




    header('Location: index.php?finish');
    exit;
} else {
    header('Location: index.php?error');
    exit;
}


/*
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