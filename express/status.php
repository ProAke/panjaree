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
if ($_GET['action'] == "completed") {

    $sql = "UPDATE `$tableDayliExpress` SET `status`='3' WHERE `id`=" . $_GET['id'];
    $conn->query($sql);
    header("location:index.php");
}
