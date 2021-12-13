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
         `price_3xl`='" . $_POST['price_3xl'] . "'                                
          WHERE `id`=" . $_POST['id'];
        $conn->query($sql);
    } else {
        $sql = "UPDATE `$tableProducts` SET `product_description`='" . $_POST['product_description'] . "',
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
         `price_3xl`='" . $_POST['price_3xl'] . "'          
          WHERE `id`=" . $_POST['id'];
        $conn->query($sql);
    }


    $conn->query($sql);
}















$tpl = new TemplatePower("../template/_tp_inner.html");
$tpl->assignInclude("body", "_tp_edit.html");
$tpl->prepare();
$tpl->assign("_ROOT.page_title", "แก้ไขสินค้า");
$tpl->assign("_ROOT.logo_brand_alt", $Brand);


$TodayThaiShow = ThaiToday($strDateTime, $tnow);
$query = "SELECT * FROM `$tableProducts` WHERE `id` = '$_GET[id]'";
$result = $conn->query($query);
while ($line = $result->fetch_assoc()) {
    $no++;
    $tpl->newBlock("PRODUCTS_EDIT");
    $tpl->assign("id", $line['id']);
    $tpl->assign("product_code", $line['code']);
    $tpl->assign("product_name", $line['product_name']);

    if (is_file("./uploads/" . $line['id'] . "/" . $line['product_photo'])) {
        $photo = "./uploads/" . $line['id'] . "/" . $line['product_photo'];
        $tpl->assign("product_photo", "<a href='#' class='d-block'><img src='" . $photo . "' class='card-img-top'></a>");
    } else {


        $tpl->assign("product_photo", "<a href='edit.php?id=" . $line['id'] . "' class='d-block'><img src='./uploads/free-upload.jpg' class='card-img-top'></a>");
    }
    $tpl->assign("product_description", $line['product_description']);
    $tpl->assign("product_price", $line['price']);

    $tpl->assign("SIZE_SS", $line['size_ss']);
    $tpl->assign("SIZE_S", $line['size_s']);
    $tpl->assign("SIZE_M", $line['size_m']);
    $tpl->assign("SIZE_L", $line['size_l']);
    $tpl->assign("SIZE_XL", $line['size_xl']);
    $tpl->assign("SIZE_XXL", $line['size_xxl']);
    $tpl->assign("SIZE_3XL", $line['size_3xl']);

    $tpl->assign("PRICE_SS", $line['price_ss']);
    $tpl->assign("PRICE_S", $line['price_s']);
    $tpl->assign("PRICE_M", $line['price_m']);
    $tpl->assign("PRICE_L", $line['price_l']);
    $tpl->assign("PRICE_XL", $line['price_xl']);
    $tpl->assign("PRICE_XXL", $line['price_xxl']);
    $tpl->assign("PRICE_3XL", $line['price_3xl']);

    $tpl->assign("product_price_discount", $line['price_discount']);
    $tpl->assign("product_price_show", $line['price_show']);
    // Load Stock table tb_stock_products
}
$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();
