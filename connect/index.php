<?php error_reporting (E_ALL ^ E_NOTICE);
/*****************************************************************
Created :19/10/2018
Author : CIG SMART+ 4.0
E-mail : worapot.kingeru@gmailc.om
Website : www.kingeru.com
Copyright (C) 2018, CIG SMART+ 4.0 by Kingeru Digital Touch all rights reserved.
*****************************************************************/
session_start();
include_once("include/config.inc.php");
include_once("include/function.inc.php");
include_once("include/class.inc.php");
include_once("include/class.TemplatePower.inc.php");

$strDate = date("Y-m-d H:i:s");
$tpl = new TemplatePower("_tp_main.html");
$tpl->assignInclude("body", "_tp_home.html");
$tpl->prepare();


// Nav

// Slide


$query = "SELECT * FROM `$tableSlide`  WHERE `PAGE_ID` = '1' AND `STATUS`='Show' ORDER BY `ID` ASC ";


$result = mysql_query($query);
while($line = mysql_fetch_array($result)){
$no++;
$tpl->newBlock("SLIDE");
$tpl->assign("no",$no);
$tpl->assign("title",$line['TITLE']);
$tpl->assign("url",$line['URL']);
	if(is_file("upload/slide/full/".$line['PHOTO'])){
		$tpl->assign("img","upload/slide/full/".$line['PHOTO']."");
		$tpl->assign("img500","upload/slide/full/".$line['PHOTO']."");
		$tpl->assign("img800","upload/slide/full/".$line['PHOTO']."");
		$tpl->assign("img1024","upload/slide/full/".$line['PHOTO']."");
	}
}

$query = "SELECT * FROM `$tableIconHome` WHERE `STATUS`='0' ORDER BY `SORT` ASC ";
$result = mysql_query($query);
while ($line = mysql_fetch_array($result)) {
$tpl->newBlock("LIST");
$tpl->assign("id",$line['ID']);
$tpl->assign("title",$line['TITLE']);
$tpl->assign("url",$line['URL']);


	if($line['TARGET']=="1"){$tpl->assign("target"," target='_blank'");}
	if(is_file("upload/icon/".$line['ICON'])){
		$tpl->assign("icon","upload/icon/".$line['ICON']);
	}else{
		$tpl->assign("icon","upload/icon/icon.png");
	}
}


CheckLogin($_COOKIE[$cookie_name]);

if($_COOKIE[$cookie_name]!=""){
	$arrData = array();
    // $arrData['USER_KEY']   	= base64_decode($user);
    $arrData['NOTE']  		= 'index'; 
    // $arrData['DATE']        = date("Y-m-d H:i:s");
    $sql = sqlCommandInsert($tableCustomersLog,$arrData);
    $query = mysql_query($sql);
    //echo $_COOKIE[$cookie_name];
}



$page_no 		=	1;
$lag			=	1;
$url 			= "https://connect.isuzusales.net/iks/";
FRONTPAGESEO($page_no,$lag,$url);
FRONTSETTING($lag);
$tpl->printToScreen();

?>
