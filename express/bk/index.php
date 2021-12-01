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



$action = $_GET['action'];
$id = $_GET['id'];
$order = $_GET['order'];
$group = $_GET['group'];


$tpl = new TemplatePower("../template/_tp_inner.html");
$tpl->assignInclude("body", "_tp_index.html");
$tpl->prepare();

// Menu
$menu2 = "Product";
$tpl->assign("_ROOT.prtitle", "<li>
							<i class='fa fa-file-o'></i>
							<a href='index.php'>Product</a>
							<i class='fa fa-angle-right'></i>
						</li>");
GetMenuAdmin($menu2);

$page_lag = $_GET['page_lag'];
if (!isset($_GET['page_lag'])  && !isset($_SESSION['page_lag']) || $_GET['page_lag'] == "" && !isset($_SESSION['page_lag'])) {
    $page_lag = "1";
}
if (!isset($_GET['page_lag'])  && isset($_SESSION['page_lag']) || $_GET['page_lag'] == "" && isset($_SESSION['page_lag'])) {
    $page_lag = $_SESSION['page_lag'];
}
GetMenuLAG($page_lag, $_GET['key'], $_GET['group'], $_GET['id']);
// Menu
//MenuGroupContropanel();


// Delete
if ($action == "delete" && $id != "") {

    $arrData = array();
    $arrData['DEL']             = '1';
    $query = sqlCommandUpdate($tableProduct, $arrData, " ID = '" . $id . "' ");
    $result = mysql_query($query);

    // Delte Image
    // $query = "SELECT * FROM `$tableProductFile` WHERE `PRODUCT_ID`='$id' AND `LAG`='{$page_lag}'";
    // $result = mysql_query($query);
    // while($line = mysql_fetch_array($result)) {

    // 		if(is_file("../../upload/product/img/".$line['NAME'])){
    // 				@unlink("../../upload/product/img/".$line['NAME']);
    // 			}
    // 		if(is_file("../../upload/product/file/".$line['NAME'])){
    // 				@unlink("../../upload/product/file/".$line['NAME']);
    // 			}		

    // }


    // $query = "DELETE FROM `$tableProductFile` WHERE `PRODUCT_ID`='$id' AND `LAG`='{$page_lag}'";
    // $result = mysql_query($query);

    // $query1 = "DELETE FROM `$tableProductDetail` WHERE `ID`='$id' AND `LAG`='{$page_lag}'";
    // $result1 = mysql_query($query1);

    //$query = "UPDATE `$tableProductDetail` SET `ORDER`=`ORDER`-1 WHERE `GROUP`='$group' && `ORDER` > '$order'";
    //$result = mysql_query($query);

    //header("Location: ./index.php?group=$group");
    //exit;
    $tpl->newBlock("REMOVE");
}

// Change Sort------------------------------------------------------
// if(isset($_POST['action']) && $_POST['action']=="sort" && isset($_POST['group']) && $_POST['group']!=""){
// print_r($_POST['order']);
if ($_POST['action'] == "sort") {
    for ($i = 0; $i < count($_POST['order']); $i++) {
        if ($_POST['id'][$i] != "" && $_POST['order'] != "") {
            $id = $_POST['id'][$i];
            $sort = $_POST['order'][$i];
            // $group =$_POST['group'][$i];
            $arrData = array();
            $arrData['RECOMMENDED_ORDER'] = $sort;
            $query = sqlCommandUpdate($tableProduct, $arrData, " `ID` = '$id' ");
            $result = mysql_query($query);
        }
    }

    // header("Location: ./index.php?group=$group");
    // exit;
}

$action = $_GET['action'];
$id = $_GET['id'];
$show = $_GET['show'];
if ($_GET['group'] == "") {
    $group = 1;
} else {
    $group = $_GET['group'];
}
// Change Status ----------------------------------------------------
if ($action == "status" && $id != "" && $group != "" && $show != "") {

    if ($show == 'No') {
        $statusShow = '0';
    } else {
        $statusShow = '1';
    }
    $query = "UPDATE `$tableProduct` SET `RECOMMENDED`='$statusShow' WHERE `ID`='$id'";
    $result = mysql_query($query);

    header("Location: ./index.php?group=" . $_GET['group']);
    exit;
}

// if($action == "status" && $id != "" && $group != "" && $arrival != ""){
// 	$query = "UPDATE `$tableProductDetail` SET `ARRIVAL`='$arrival' WHERE `ID`='$id'";
// 	$result = mysql_query($query);

// 	header("Location: ./index.php?group=$group");
// 	exit;
// }


// if($action == "status" && $id != "" && $group != "" && $sold != ""){
// 	$query = "UPDATE `$tableProductDetail` SET `SOLDOUT`='$sold' WHERE `ID`='$id'";
// 	$result = mysql_query($query);


// 	header("Location: ./index.php?group=$group");
// 	exit;
// }


// Change Order Up
// if($action == "change_order" && $order != "" && $status == "up" && $group != ""){

// 	$query = "UPDATE `$tableProductDetail` SET `ORDER`='0' WHERE `GROUP`='$group' && `ORDER`='".($order-1)."'";
// 	$result = mysql_query($query);

// 	$query = "UPDATE `$tableProductDetail` SET `ORDER`='".($order-1)."' WHERE `GROUP`='$group' && `ORDER`='".($order)."'";
// 	$result = mysql_query($query);

// 	$query = "UPDATE `$tableProductDetail` SET `ORDER`='".($order)."' WHERE `GROUP`='$group' && `ORDER`='0'";
// 	$result = mysql_query($query);


// 	header("Location: ./index.php?group=$group");
// 	exit;
// }

// Change Order Down
// if($action == "change_order" && $order != "" && $status == "down" && $group != ""){

// 	$query = "UPDATE `$tableProductDetail` SET `ORDER`='0' WHERE `GROUP`='$group' && `ORDER`='".($order+1)."'";
// 	$result = mysql_query($query);

// 	$query = "UPDATE `$tableProductDetail` SET `ORDER`='".($order+1)."' WHERE `GROUP`='$group' && `ORDER`='".($order)."'";
// 	$result = mysql_query($query);

// 	$query = "UPDATE `$tableProductDetail` SET `ORDER`='".($order)."' WHERE `GROUP`='$group' && `ORDER`='0'";
// 	$result = mysql_query($query);

// 	header("Location: ./index.php?group=$group");
// 	exit;
// }

$group = 1;


if (isset($_GET['group']) && $_GET['group'] != "") {
    $group = $_GET['group'];
}
//if($group == "10") $group = 17;

// Group
/*		$query = "SELECT * FROM `$tableGroupDetail` WHERE `GROUP`='0' AND `LAG`='$page_lag'  ORDER BY `ORDER` ASC";
		$result = mysql_query($query);
		while($line = mysql_fetch_array($result)) {
			$tpl->newBlock("PRODUCT_GROUP");
			$tpl->assign("intGroupID",$line["ID"]);
			$tpl->assign("intSubGroupID",$line["GROUP"]);
			$tpl->assign("intTypeID",$line["SUBGROUP"]);
			$tpl->assign("intClassID",$line["SUBGROUP2"]);
			$tpl->assign("strGroupName",$line["NAME"]);
			 if("".$line["ID"]."|".$line["GROUP"]."|".$line["SUBGROUP"]."|".$line["SUBGROUP2"]."" == $_GET['group']){
				$tpl->assign("strselected","selected");				
			 }else{}		

			// Select Sub Data
			$query_sub = "SELECT * FROM `$tableGroupDetail` WHERE `GROUP`='".$line["ID"]."' AND `SUBGROUP`='0' AND `LAG`='$page_lag' ORDER BY `ORDER` ASC";
			$result_sub = mysql_query($query_sub);
			while ($line_sub = mysql_fetch_array($result_sub)) {
				$tpl->newBlock("PRODUCT_GROUP");
				$tpl->assign("intGroupID",$line_sub["GROUP"]);
				$tpl->assign("intSubGroupID",$line_sub["ID"]);
				$tpl->assign("intTypeID",$line_sub["SUBGROUP"]);
				$tpl->assign("intClassID",$line_sub["SUBGROUP2"]);
				$tpl->assign("strGroupName","&nbsp;-".$line_sub["NAME"]);
					if("".$line_sub["GROUP"]."|".$line_sub["ID"]."|".$line_sub["SUBGROUP"]."|".$line_sub["SUBGROUP2"]."" == $_GET['group']){
					$tpl->assign("strselected","selected");
					}	else{}
					
					// Select Sub2 Data
					$query_sub2 = "SELECT * FROM `$tableGroupDetail` WHERE `SUBGROUP`='".$line_sub["ID"]."' AND `SUBGROUP2`='0'  AND `LAG`='$page_lag' ORDER BY `ORDER` ASC";
					$result_sub2 = mysql_query($query_sub2);
					while ($line_sub2 = mysql_fetch_array($result_sub2)) {
						$tpl->newBlock("PRODUCT_GROUP");
				
						$tpl->assign("intGroupID",$line_sub2["GROUP"]);
						$tpl->assign("intSubGroupID",$line_sub2["SUBGROUP"]);
						$tpl->assign("intTypeID",$line_sub2["ID"]);
						$tpl->assign("intClassID",$line_sub2["SUBGROUP2"]);						
						$tpl->assign("strGroupName","&nbsp;&nbsp;&nbsp;-".$line_sub2["NAME"]);
				
						if("".$line_sub2["GROUP"]."|".$line_sub2["ID"]."|".$line_sub2["SUBGROUP"]."|".$line_sub2["SUBGROUP2"]."" == $_GET['group']){
							$tpl->assign("strselected","selected");
						}else{}
				
							// Select Class Data
							$query_sub3 = "SELECT * FROM `$tableGroupDetail` WHERE `SUBGROUP2`='".$line_sub2["ID"]."'  AND `LAG`='$page_lag' ORDER BY `ORDER` ASC";
							$result_sub3 = mysql_query($query_sub3);
							while ($line_sub3 = mysql_fetch_array($result_sub3)) {
								$tpl->newBlock("PRODUCT_GROUP");
						
								$tpl->assign("intGroupID",$line_sub3["GROUP"]);
						$tpl->assign("intSubGroupID",$line_sub3["SUBGROUP"]);
						$tpl->assign("intTypeID",$line_sub3["SUBGROUP2"]);
						$tpl->assign("intClassID",$line_sub3["ID"]);						
								
								$tpl->assign("strGroupName","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-".$line_sub3["NAME"]);
						
								if("".$line_sub3["GROUP"]."|".$line_sub3["SUBGROUP"]."|".$line_sub3["SUBGROUP2"]."|".$line_sub3["ID"]."" == $_GET['group']){
									$tpl->assign("strselected","selected");
								}else{}
						
							}					
				
				
					}					
								
			}
		}


$tpl->newBlock("ADD_GROUP");
$tpl->assign("group",$group);
$tpl->assign("page_lag",$page_lag);*/



// Select Sub Group
/*$query = "SELECT * FROM `$tableGroup` WHERE `GROUP`='$group'  ORDER BY `ORDER` ASC";
$result = mysql_query($query);*/

/*if(mysql_num_rows($result) > 0){
	$sqlGroupId = "";
	while ($line = mysql_fetch_array($result)) {
		if(isset($_SESSION['page_lag']) && $_SESSION['page_lag']!=""){
		$sqlGroupId .= "`GROUP`='".$line["ID"]."' OR `GROUP_SUB`='".$line["GROUP"]."' OR `GROUP2_SUB`='".$line["SUBGROUP"]."' AND `LAG`='".$page_lag."' OR ";
		}
	}
	$sqlGroupId .= "`GROUP`=''";
}else{
	$sqlGroupId .= "`GROUP`='$group' AND `LAG`='".$_SESSION['page_lag']."'";
}*/

$sqlGroupId = "";

$ex_group = explode("|", $_GET['group']);

/*$query = "SELECT * FROM `$tableGroupDetail` WHERE `ID`='".$ex_group[0]."' AND `LAG`='$page_lag' ORDER BY `ORDER` ASC";
$result = mysql_query($query);
while ($line = mysql_fetch_array($result)) {

	$tpl->newBlock("test");
	
	$tpl->assign("1",$group);
	$tpl->assign("12",$line["ID"]);
	$tpl->assign("13",$line["GROUP"]);
	$tpl->assign("14",$line["SUBGROUP"]);	*/

/*		if($_GET['group']==""){
			$sqlGroupId .= "`GROUP` != '0' AND ";
			
		}elseif(($ex_group[0]!="0" && $ex_group[1]=="0")&&($ex_group[2]=="0" && $ex_group[3]=="0")){
			$sqlGroupId .= "`GROUP`='".$ex_group[0]."' AND ";
			
		}elseif(($ex_group[0]!="0" && $ex_group[1]!="0")&&($ex_group[2]=="0" && $ex_group[3]=="0")){
			$sqlGroupId .= "`GROUP`='".$ex_group[0]."' AND `GROUP_SUB`='".$ex_group[1]."' AND ";
			
		}elseif(($ex_group[0]!="0" && $ex_group[1]!="0")&&($ex_group[2]!="0" && $ex_group[3]=="0")){
			$sqlGroupId .= "`GROUP`='".$ex_group[0]."' AND `GROUP_SUB`='".$ex_group[1]."'  AND `GROUP_TYPE`='".$ex_group[2]."' AND ";
			
		}elseif(($ex_group[0]!="0" && $ex_group[1]!="0")&&($ex_group[2]!="0" && $ex_group[3]!="0")){
			$sqlGroupId .= "`GROUP`='".$ex_group[0]."' AND `GROUP_SUB`='".$ex_group[1]."'  AND `GROUP_TYPE`='".$ex_group[2]."' AND `GROUP_CLASS`='".$ex_group[3]."' AND ";
		}*/


/*}*/




$productCatalog = ListProductGroups($page_lag);
foreach ($productCatalog as $key => $value) {
    $ex = explode("|", $value);
    $tpl->newBlock("CATEGORY");
    $tpl->assign("CATALOG_ID", $ex[0] . '|' . $ex[1]);
    if ($ex[1] != '0') {
        $tpl->assign("CATALOG_TITLE", '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $ex[2] . '');
    } else {
        $tpl->assign("CATALOG_TITLE", $ex[2]);
    }

    if (($ex[0] == $checkSearch[0]) || ($ex[0] == $_GET['group'])) {
        $tpl->assign("strselected", 'selected="selected"');
    }
}

$arrayProductsGroup = array();
$query = "SELECT * FROM `$tableProductGroups` WHERE `DEL` = '0' ORDER BY `ID` ASC ";
$result = mysql_query($query);
while ($line = mysql_fetch_array($result)) {

    $query2 = "SELECT * FROM `$tableProductGroupsDetail` WHERE `LAG` = '" . $page_lag . "' AND `ID` = '" . $line['ID'] . "' ";
    $result2 = mysql_query($query2);
    while ($line2 = mysql_fetch_array($result2)) {
        // array_push($data, $line['ID'].'|'.$line['SUB'].'|'.$line2['NAME']);
        $arrayProductsGroup[$line['ID']] = $line2['NAME'];
    }
}


// Select Product Group
$groupColor = array();
$groupColorTmp = array("#FFFFFF", "#00ff0c", "#f0dbee", "#a2ffa6", "#c8fdcb", "#c8fdcb", "#c8fd00", "#d9ddfc", "#FFFFFF", "#f0dbee");
/*$queryProGroup = "SELECT `PRODUCT_GROUP` FROM `$tableProduct` GROUP BY `PRODUCT_GROUP` ORDER BY `PRODUCT_GROUP` ASC";
$resultProGroup = mysql_query($queryProGroup);
$k = 0;
while($lineProGroup = mysql_fetch_array($resultProGroup)){
	$groupColor[$lineProGroup["PRODUCT_GROUP"]] = $groupColorTmp[$k];
	$k++;
}*/

// Select Product
$key = "";
$lag = "";
$key = $_GET['key'];
$lag = " `LAG`='" . $_SESSION['page_lag'] . "'";
if (isset($_GET['key']) && $_GET['key'] != "") {
    $sqlGroupId = "";
}

//if($key!="" && $sqlGroupId !="")  {$key=" AND `NAME` Like '%$key%'  OR  `MODEL` Like '%$key%'";$lag="AND `LAG`='".$_SESSION['page_lag']."'";}
//if($key!="" && $sqlGroupId =="")   { $key=" `NAME` Like '%$key%'  OR  `MODEL` Like '%$key%'";$lag="AND `LAG`='".$_SESSION['page_lag']."'";}

if (!isset($_GET['key']) ||  $_GET['key'] == "") {
    $key = "";
    $tpl->newBlock("PRODUCT_KEY");
    $tpl->assign("page_lag", $page_lag);
    $tpl->assign("key", "");
    $tpl->assign("group", $_GET['group']);
    $tpl->newBlock("PRODUCT_KEY2");
    $tpl->assign("page_lag", $page_lag);
    $tpl->assign("key", "");
} else {
    $tpl->newBlock("PRODUCT_KEY");
    $tpl->assign("page_lag", $page_lag);
    $tpl->assign("key", $_GET['key']);
    $tpl->assign("group", $_GET['group']);
    $tpl->newBlock("PRODUCT_KEY2");
    $tpl->assign("page_lag", $page_lag);
    $tpl->assign("key", $_GET['key']);
}

$checkSearch = explode("|", $_POST['category']);
$no = '1';
// echo $_POST['category'];

/*$arrayIdProduct = array();
$queryChk = "SELECT * FROM `$tableProduct` WHERE `DEL` = '0' ";
if($_POST['category']!=''){
	if($checkSearch[1]=='0'){
		$queryChk .= " AND (`GROUP` = '".$checkSearch[0]."' OR `SUBGROUP` = '".$checkSearch[0]."') ";	
	}else{
		$queryChk .= " AND `GROUP` = '".$checkSearch[0]."' ";	
	}
}
if($_GET['group']!=''){
	$queryChk .= " AND `GROUP` = '".$_GET['group']."' ";
}
$queryChk .= " ORDER BY `RECOMMENDED` DESC,`ID` DESC ";

$resultChk = mysql_query($queryChk);
$count = mysql_num_rows($resultChk);
$tpl->assign("count",number_format($count));
while ($lineChk = mysql_fetch_array($resultChk)) {
	array_push($arrayIdProduct, $lineChk['ID']);
}*/

// $query = "SELECT * FROM `$tableProductDetail` WHERE `ID` IN(".implode(",", $arrayIdProduct).") AND `LAG` = '".$_SESSION['page_lag']."' ORDER BY `UPDATE` DESC,`DATE` DESC";
$query = "SELECT * FROM `$tableProduct` WHERE `DEL` = '0' ";
if ($_POST['category'] != '') {
    if ($checkSearch[1] == '0') {
        $query .= " AND (`GROUP` = '" . $checkSearch[0] . "' OR `SUBGROUP` = '" . $checkSearch[0] . "') ";
    } else {
        $query .= " AND `GROUP` = '" . $checkSearch[0] . "' ";
    }
}
$query .= " ORDER BY `RECOMMENDED` DESC,`RECOMMENDED_ORDER` ASC,`ID` DESC ";
$result = mysql_query($query);
// if(mysql_num_rows($result)>'0'){
while ($line = mysql_fetch_array($result)) {
    $tpl->newBlock("DATA");
    $tpl->assign("no", $no);
    $tpl->assign("id", $line["ID"]);
    $tpl->assign("sub", $line["SUB"]);
    $tpl->assign("code", $line["CODE"]);
    $tpl->assign("order", $line['RECOMMENDED_ORDER']);

    if (is_file("../../upload/product/img/" . $line["PHOTO1"])) {
        $tpl->assign("strImg", "<img src='../../upload/product/img/" . $line["PHOTO1"] . "' width='100'><br>");
    }

    if ($line["SUBGROUP"] > '0') {
        $tpl->assign("group_name", $arrayProductsGroup[$line["SUBGROUP"]] . "->" . $arrayProductsGroup[$line["GROUP"]]);
    } else {
        $tpl->assign("group_name", $arrayProductsGroup[$line["GROUP"]]);
    }
    // $CheckGroup = CheckProductGroups($page_lag,$line["GROUP"]);
    // if($line["SUBGROUP"]>'0'){
    // 	$CheckSubGroup = CheckProductGroups($page_lag,$line["SUBGROUP"]);
    // 	$tpl->assign("group_name",$CheckSubGroup['TITLE']."->".$CheckGroup['TITLE']);
    // }else{
    // 	$tpl->assign("group_name",$CheckGroup['TITLE']);
    // }		

    $tpl->assign("prices", number_format($line["PRICES"]));
    $tpl->assign("pricessale", number_format($line["PRICESSALE"]));
    $tpl->assign("strModel", $line["MODEL"]);
    $tpl->assign("intGroup", $line["GROUP"]);
    $tpl->assign("intSubGroup", $line["SUBGROUP"]);
    $tpl->assign("sort", $line["SORT"]);

    if ($line["RECOMMENDED"] == "1") {
        $tpl->assign("s", "Yes");
        $tpl->assign("show", "No");
        $tpl->assign("showOrder", '<input type="text" value="' . $line['RECOMMENDED_ORDER'] . '" name="order[]" size="3" />
                                    	<input type="hidden" name="id[]" value="' . $line['ID'] . '" /><input type="submit" value="อัพเดต" class="btn default" />');
    } else {
        $tpl->assign("s", "No");
        $tpl->assign("show", "Yes");
    }

    $query1 = "SELECT * FROM `$tableProductDetail` WHERE `ID` = '" . $line["ID"] . "' AND `LAG` = '" . $_SESSION['page_lag'] . "' ";
    $result1 = mysql_query($query1);
    while ($line1 = mysql_fetch_array($result1)) {
        $tpl->assign("title", $line1["TITLE"]);
        $tpl->assign("prices_text", $line1["PRICES_TEXT"]);
    }

    $query2 = "SELECT * FROM `$tableProductView` WHERE `product_id` = '" . $line["ID"] . "' ";
    $result2 = mysql_query($query2);
    $count    =    mysql_num_rows($result2);
    $tpl->assign("view", $count);

    // $query2 = "SELECT * FROM `$tableProductGroupsDetail` WHERE `ID` = '".$line["GROUP"]."' AND `LAG` = '".$_SESSION['page_lag']."'";
    // $result2 = mysql_query($query2);
    // while ($line2 = mysql_fetch_array($result2)) {	
    // 		$tpl->assign("group_name",$line2["TITLE"]);
    // }

    // if($line["ARRIVAL"] == "Yes"){
    // 	$tpl->assign("arrival","Yes");
    // 	$tpl->assign("arrival_strChangeStatus","No");
    // }else{
    // 	$tpl->assign("arrival","No");
    // 	$tpl->assign("arrival_strChangeStatus","Yes");
    // }



    // if($line["SOLDOUT"] == "Yes"){
    // 	$tpl->assign("sold","Yes");
    // 	$tpl->assign("sold_strChangeStatus","No");
    // }else{
    // 	$tpl->assign("sold","No");
    // 	$tpl->assign("sold_strChangeStatus","Yes");
    // }





    // $tpl->assign("strRowColor",$groupColor[$line["PRODUCT_GROUP"]]);

    // if($line["ORDER"] > 1){
    // 	$tpl->assign("strOrderUp","<a href=\"?order=".$line["ORDER"]."&action=change_order&status=up&group=".$line["GROUP"]."\">Up</a>");
    // }

    // if($line["ORDER"] < mysql_num_rows($result)){
    // 	$tpl->assign("strOrderDown","<a href=\"?order=".$line["ORDER"]."&action=change_order&status=down&group=".$line["GROUP"]."\">Down</a>");
    // }
    $no++;
}
// }



// print_r($productCatalog);
$tpl->printToScreen();
