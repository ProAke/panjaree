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




    if (!file_exists('uploads/' . $_POST['id'])) {
        mkdir('uploads/' . $_POST['id'], 0777, true);
    }

    if ($_FILES["product_photo"]["size"] > "0") {
        $extension  = pathinfo($_FILES["product_photo"]["name"], PATHINFO_EXTENSION); // jpg
        $new_name   = $_POST['product_code'] . "." . $extension;
        $Photo_type = ["product_photo"]["type"];
        $new_photo = SaveUploadImg($_FILES['product_photo'], 'uploads/' . $_POST['id'] . '/');
        rename('uploads/' . $_POST['id'] . '/' . $new_photo, 'uploads/' . $_POST['id'] . '/' . $new_name);

        $sql = "UPDATE `$tableProducts` SET `product_photo`='" . $new_name . "',
        `code`='" . $_POST['product_code'] . "',        
         `product_description`='" . $_POST['product_description'] . "',
         `product_name`='" . $_POST['product_name'] . "',
         `size_ss`='" . $_POST['size_ss'] . "',
         `size_s`='" . $_POST['size_s'] . "',
         `size_m`='" . $_POST['size_m'] . "',
         `size_l`='" . $_POST['size_l'] . "',         
         `size_xl`='" . $_POST['size_xl'] . "',         
         `size_xxl`='" . $_POST['size_xxl'] . "',    
         `size_3xl`='" . $_POST['size_3xl'] . "',
         `price_ss`='" . $_POST['price_ss'] . "',
         `price_s`='" . $_POST['price_s'] . "',
         `price_m`='" . $_POST['price_m'] . "',
         `price_l`='" . $_POST['price_l'] . "',         
         `price_xl`='" . $_POST['price_xl'] . "',         
         `price_xxl`='" . $_POST['price_xxl'] . "',    
         `price_3xl`='" . $_POST['price_3xl'] . "',
         `ag_price_ss`='" . $_POST['ag_price_ss'] . "',
         `ag_price_s`='" . $_POST['ag_price_s'] . "',
         `ag_price_m`='" . $_POST['ag_price_m'] . "',
         `ag_price_l`='" . $_POST['ag_price_l'] . "',         
         `ag_price_xl`='" . $_POST['ag_price_xl'] . "',         
         `ag_price_xxl`='" . $_POST['ag_price_xxl'] . "',    
         `ag_price_3xl`='" . $_POST['ag_price_3xl'] . "'                                           
          WHERE `id`=" . $_POST['id'];
    } else {
        $sql = "UPDATE `$tableProducts` SET `product_description`='" . $_POST['product_description'] . "',
        `code`='" . $_POST['product_code'] . "',
         `product_name`='" . $_POST['product_name'] . "',
         `size_ss`='" . $_POST['size_ss'] . "',
         `size_s`='" . $_POST['size_s'] . "',
         `size_m`='" . $_POST['size_m'] . "',
         `size_l`='" . $_POST['size_l'] . "',         
         `size_xl`='" . $_POST['size_xl'] . "',         
         `size_xxl`='" . $_POST['size_xxl'] . "',    
         `size_3xl`='" . $_POST['size_3xl'] . "',
         `price_ss`='" . $_POST['price_ss'] . "',
         `price_s`='" . $_POST['price_s'] . "',
         `price_m`='" . $_POST['price_m'] . "',
         `price_l`='" . $_POST['price_l'] . "',         
         `price_xl`='" . $_POST['price_xl'] . "',         
         `price_xxl`='" . $_POST['price_xxl'] . "',    
         `price_3xl`='" . $_POST['price_3xl'] . "',
         `ag_price_ss`='" . $_POST['ag_price_ss'] . "',
         `ag_price_s`='" . $_POST['ag_price_s'] . "',
         `ag_price_m`='" . $_POST['ag_price_m'] . "',
         `ag_price_l`='" . $_POST['ag_price_l'] . "',         
         `ag_price_xl`='" . $_POST['ag_price_xl'] . "',         
         `ag_price_xxl`='" . $_POST['ag_price_xxl'] . "',    
         `ag_price_3xl`='" . $_POST['ag_price_3xl'] . "'                     
          WHERE `id`=" . $_POST['id'];
    }
    $conn->query($sql);
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
