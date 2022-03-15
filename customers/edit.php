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
$tpl->assignInclude("body", "_tp_edit.html");
$tpl->prepare();
$tpl->assign("_ROOT.page_title", "แก้ไขข้อมูลลูกค้า");
$tpl->assign("_ROOT.logo_brand_alt", $Brand);
$action = isset($_POST['action']) ? $_POST['action'] : '';













$tpl->assign("_ROOT.TodayThaiShow", $TodayThaiShow);
$tpl->assign("_ROOT.Powerby", $Powerby);
$tpl->assign("_ROOT.Copyright", $Copyright);
$tpl->printToScreen();
