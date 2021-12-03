<?php
include_once("../include/config.inc.php");
include_once("../include/class.inc.php");
include_once("../include/function.inc.php");

header('Content-Type: application/json; charset=utf-8');


$query = "SELECT * FROM `tb_DailyExpress` WHERE `status` = '1'";
$result = $conn->query($query);


//START LOOP
while ($line = $result->fetch_assoc()) {

    $trackid = $line['code'];



    //END LOOP

    $i++;
}
