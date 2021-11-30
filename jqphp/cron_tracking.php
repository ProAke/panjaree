<?php error_reporting(E_ALL ^ E_NOTICE);
/*****************************************************************
Created		: 21/10/2021
Author		: Ake.Worapot
E-mail		: worapot@yahoo.com
server		: www.vpslive.com
PHP Version : 7.0++
Copyright (C) 2010-2025, VPSLive Digital Together's , all rights reserved.
 *****************************************************************/

$db_config = array(
    "host" => "203.146.252.149",
    "user" => "fufudev_panjaree",
    "pass" => "6%Dn3j8a",
    "dbname" => "panjaree_web",
    "charset" => "utf8"
);

$conn = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);




$sql = "SELECT * FROM `tb_DailyExpress` WHERE `status` = '1'";
$query = $conn->query($sql) or die($conn->error);
$t = $query->num_rows;

$query = "INSERT INTO `tb_bot_action`(`action`, `note` ,`tdate`) VALUES($t,'น่าสนใจ','" . date("Y-m-d H:i:s") . "')";
$result = $conn->query($query);

echo "200";
//echo $query;