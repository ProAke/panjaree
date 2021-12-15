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







$start  = $_GET['start'];
$end    = $_GET['end'];


$query = "SELECT * FROM `$tableProducts` WHERE `id` > '" . $start . "' and `id` < '" . $end . "'";
$result = $conn->query($query);
while ($line = $result->fetch_assoc()) {
    $no++;
    $tname = substr($line['product_photo'], -4) . "<br>";
    $Nname = $line['code'] . $tname;


    if (is_file("./uploads/" . $line['id'] . "/" . $line['product_photo'])) {
        rename("./uploads/" . $line['id'] . "/" . $line['product_photo'], "./uploads/" . $line['id'] . "/" . $Nname);
        $sql = "UPDATE `$tableProducts` SET `product_photo='" . $Nname . "',                    
         WHERE `id`=" . $line['id'];
        $conn->query($sql);
        echo "สำเร็จ";
    } else {
        echo "no image";
    }
}
