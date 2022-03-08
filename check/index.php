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
//include_once("../authentication/check_login.php");

echo $_SESSION['LineID'] . "<<<";
echo $_SESSION['UserID'] . "<<<";



print_r($_COOKIE);  // แสดง Cookies ทั้งหมดที่ php สามารถอ่านได้ 
// สร้าง Loop เพื่อ กำหนดให้ Cookies หมดอายุไป

foreach ($_COOKIE as $k => $v) {
    setcookie($k, "", time() - 3600);
}

$_SESSION = array();
