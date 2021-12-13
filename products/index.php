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
$tpl->assign("_ROOT.page_title", "คลังสินค้า");
$tpl->assign("_ROOT.logo_brand_alt", $Brand);


$TodayThaiShow = ThaiToday($strDateTime, $tnow);




///$query = "SELECT * FROM `$tableProducts` WHERE `status`='1' ORDER BY `ID` DESC";
$query = "SELECT * FROM `$tableProducts` ORDER BY `id` DESC";
$result = $conn->query($query);
while ($line = $result->fetch_assoc()) {
    $no++;
    $tpl->newBlock("PRODUCTS");
    $tpl->assign("id", $line['id']);
    $tpl->assign("product_code", $line['code']);
    $tpl->assign("product_name", $line['product_name']);



    if (is_file("./uploads/" . $line['id'] . "/" . $line['product_photo'])) {
        $photo = "./uploads/" . $line['id'] . "/" . $line['product_photo'];
        $tpl->assign("photo", "<a href='edit.php?id=" . $line['id'] . "' class='d-block'><img src='" . $photo . "' class='card-img-top'></a>");
    } else {


        $tpl->assign("photo", "<a href='edit.php?id=" . $line['id'] . "' class='d-block'><img src='./uploads/free-upload.jpg' class='card-img-top'></a>");
    }


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

    $tpl->assign("product_price", $line['price']);
    $tpl->assign("product_price_discount", $line['price_discount']);
    $tpl->assign("product_price_show", $line['price_show']);
    // Load Stock table tb_stock_products
}










$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();
