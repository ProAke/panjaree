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




$sql = "SELECT * FROM `" . $tableProducts . "`";
$query = $conn->query($sql) or die($conn->error);
$total = $query->num_rows;
$total = number_format($total) + 1;




$arrData = array();
$arrData['code']                            = $total;
//$arrData['product_name']                    = "พริ้วพราย";
//$arrData['tdate']                    = date("Y-m-d H:i:s");
$query = sqlCommandInserts($tableProducts, $arrData);
$query = str_replace("(,", "(", $query);




//$result = $conn->query($query);

echo $query . "<br>";
//echo '<meta http-equiv="refresh" content="1" >';
date_default_timezone_set('asia/bangkok');
echo date("Y-m-d");
echo ":: " . date('H:i:s');