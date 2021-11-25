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


$action = isset($_POST['action']) ? $_POST['action'] : '';
if ($action == 'new') {
    $arrData = array();
    $arrData['ag_id']       = $_POST['ag_id'];
    $arrData['ag_name']     = $_POST['ag_name'];
    $arrData['ag_phone']    = $_POST['ag_phone'];
    $arrData['ag_shopname'] = $_POST['ag_shop'];
    $arrData['ag_address']  = $_POST['ag_address'];
    $arrData['ag_linegroup'] = $_POST['ag_linegroup'];
    $arrData['cs_name']     = $_POST['cs_name'];
    $arrData['cs_phone']    = $_POST['cs_phone'];
    $arrData['cs_address']  = $_POST['cs_address'];
    $arrData['logistics']   = $_POST['logistics'];
    $arrData['shipping_type'] = $_POST['shipping_type'];
    $arrData['slip_bank']   = $_POST['slip_bank'];
    $arrData['slip_total']  = $_POST['slip_total'];
    $arrData['slip_date']   = $_POST['slip_date'];
    $arrData['product_image'] = $_POST['product_image'];
    $arrData['product_name'] = $_POST['product_name'];
    $arrData['product_size'] = $_POST['product_size'];
    $arrData['order_note'] = $_POST['note'];
    $arrData['order_tdate'] = date("Y-m-d H:i:s");

    foreach ($arrData as $key => $value) {
        $arrFieldTmp[] = "`$key`";
        $arrValueTmp[] = "'$value'";
    }
    $strFieldTmp = implode(",", $arrFieldTmp);
    $strValueTmp = implode(",", $arrValueTmp);
    $query = "INSERT INTO `$tableOrders`($strFieldTmp) VALUES($strValueTmp)";
    $result = $conn->query($query);




    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../index.php?error');
    exit;
}



/*id
id
ag_id
ag_uid
ag_cid
ag_name
ag_phone
ag_shopname
ag_address
line_groups
cs_name
cs_phone
cs_address
logistics
shipping_type
slip_bank
slip_total
slip_date
slip_status
product_image
product_name
product_size
order_note
order_tdate
tracking_code

*/