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



$barcode = isset($_GET['barcode']) ? $_GET['barcode'] : '';
$action = $_POST['action'];



if ($action == 'save') {
    $barcodes = $_POST['barcodes'];
    $newfilename1 = SaveUploadImg($_FILES['photo'], "files/photo/");
    $arrData = array();


    if ($newfilename1) {
        $arrData['IMG'] = "files/photo/" . $newfilename1;
    } else if ($_POST['url']) {
        $arrData['IMG'] = $_POST['url'];
    }

    if ($_POST['name']) {
        $arrData['NAME'] = $_POST['name'];
    }
    if ($_POST['produced_name']) {
        $arrData['PRODUCED_NAME'] = $_POST['produced_name'];
    }
    if ($_POST['produced_code']) {
        $arrData['PRODUCED_CODE'] = $_POST['produced_code'];
    }
    if ($_POST['items_stock']) {
        $arrData['ITEMS_STOCK'] = $_POST['items_stock'];
    }
    if ($_POST['items_all']) {
        $arrData['ITEMS_ALL'] = $_POST['items_all'];
    }
    if ($_POST['series']) {
        $arrData['SERIES'] = $_POST['series'];
    }
    if ($_POST['bprice']) {
        $arrData['NPRICE'] = $_POST['nprice'];
    }
    if ($_POST['nprice']) {
        $arrData['BPRICE'] = $_POST['bprice'];
    }
    if ($_POST['detail']) {
        $arrData['DETAIL'] = $_POST['detail'];
    }
    if ($_POST['aoryor']) {
        $arrData['AORYOR'] = $_POST['aoryor'];
    }

    $arrData['DATETIME'] = date("Y-m-d H:i:s");
    $query = sqlCommandUpdate($tableBarcode, $arrData, "`BARCODE`='" . $barcodes . "'");
    $result = $conn->query($query);
}
