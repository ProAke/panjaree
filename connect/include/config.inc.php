<?php error_reporting (E_ALL ^ E_NOTICE);
/*****************************************************************
Created :19/10/2018
Author : CIG SMART+ 4.0
E-mail : worapot.kingeru@gmailc.om
Website : www.kingeru.com
Copyright (C) 2018, CIG SMART+ 4.0 by Kingeru Digital Touch all rights reserved.
*****************************************************************/

	$dbHostname = "localhost";
	$dbUsername = "iksconnectweb";
	$dbPassword = "T976aq?m";
	$dbName = "iks_connect";
// iks_connect >> iksconnectweb  >>  T976aq?m

date_default_timezone_set("Asia/Bangkok");

$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android= stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
$status=true;

if( $iPod || $iPhone ){
$status=false;
        //were an iPhone/iPod touch -- do something here
}else if($iPad){
$status=false;
        //were an iPad -- do something here
}else if($Android){
$status=false;
        //were an Android device -- do something here
}else if($webOS){
$status=false;
        //were a webOS device -- do something here
	}
	if($status==true){
//	header( 'Location: https://connecct.isuzusales.net/iks/' ) ;
	}

// Display Error ,0=none display,1=display
@ini_set('display_errors', '1');
@set_time_limit(0);

// Cookie
$cookie_name = "isuzuslaes_iks";

// MySQL Table
$tableLag 								= "lag";
$tableAdmin 							= "admin_user";
$tableAdminMenu 						= "admin_menu";
$tableCeoMenu							= "ceo_menu";
$tableMessage 							= "message";
$tableMailMessage 						= "mail_message";
$tableManual							= "manual";
$tableSetting							= "setting";
$tableCompany							= "company";
$tableBranch							= "branch";
$tableDepartment						= "department";
$tablePosition							= "position";
$tableTeams								= "teams";
$tableEmployee							= "employee";

$tableProvince							= "province";
$tableAmphur							= "amphur";
$tableDistrict							= "district";

$tableCustomers							= "customers";
$tableCustomersLog						= "customers_log";

$tablePage 								= "page";
$tablePageDetail 						= "page_detail";
$tablePageGroup 						= "page_group";

$tableSlidePage							= "slide_page";
$tableSlide								= "slide";
$tableSlideDetail						= "slide_detail";

$tableCampaignEvent						= "campaign_event";
$tableCampaignEventDetail				= "campaign_event_detail";
$tableCampaignEventCatalog				= "campaign_event_catalog";
$tableCampaignEventCatalogDetail		= "campaign_event_catalog_detail";

$tableIsuzuNew							= "buy_isuzu_new";
$tableIsuzuNewDetail					= "buy_isuzu_new_detail";
$tableIsuzuNewCatalog					= "buy_isuzu_new_catalog";
$tableIsuzuNewCatalogDetail				= "buy_isuzu_new_catalog_detail";
$tableIsuzuNewCatalogDetailLog			= "buy_isuzu_new_detail_log";

$tableIsuzuUsed							= "buy_isuzu_used";
$tableIsuzuUsedDetail					= "buy_isuzu_used_detail";
$tableIsuzuUsedCatalog					= "buy_isuzu_used_catalog";
$tableIsuzuUsedCatalogDetail			= "buy_isuzu_used_catalog_detail";
$tableIsuzuUsedCatalogDetailLog			= "buy_isuzu_used_detail_log";

$tableIconHome							= "icon_home";
$tableIcomMembers						= "icon_members";

$ModelTestDrive							= "model_test_drive";
$tableBuyInsurance						= "buy_insurance";
$tableBookingServices					= "services_booking";
$tableTestDrive							= "test_drive";
$tableSpecialOffer						= "specialoffer";


$tableIconHome								= "icon_home";
$tableIcomMembers						= "icon_members";



// All config
$cfgDefaultPerPage = 5;
$cfgOtherRowPerPage = 20;

// Session
if(substr_count($_SERVER["SCRIPT_NAME"],"/") == 1){
	session_name("swcms");
}

session_start();


if(empty($_SESSION['file_upload'])) $_SESSION['file_upload'] = array();


// Connect MySQL
@mysql_connect($dbHostname, $dbUsername, $dbPassword);
@mysql_select_db($dbName)or die(mysql_error());
@mysql_query("SET NAMES utf8");

if($_SESSION["lang"] ==""){
	$_SESSION["lang"] ="_th";
}
if($_GET['lang'] != "" ){
	unset($_SESSION["lang"]);
	if($_GET['lang']=="th"){$_SESSION["lang"] ="_th";}else{$_SESSION["lang"] ="_eng";}
}


// Replace ' to \' For Block attack Hacking
if(!get_magic_quotes_gpc()){
	$_GET = array_map('setMagicQuotesGPC', $_GET);
	$_POST = array_map('setMagicQuotesGPC', $_POST);
	$_COOKIE = array_map('setMagicQuotesGPC', $_COOKIE);
}

function setMagicQuotesGPC($element){
	if(is_array($element)){
		return array_map('setMagicQuotesGPC', $element);
	}else{
		return addslashes($element);
	}
}


?>
