<?php error_reporting(E_ALL ^ E_NOTICE);

include_once("../include/config.inc.php");
include_once("../include/function.inc.php");
include_once("../include/class.inc.php");

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($action == 'del' && isset($id)) {
    $query = "DELETE FROM `$tableOrders` WHERE `id`='" . $id . "'";
    $result = $conn->query($query);


    header('Location: ../index.php?rm=' . $id);
    exit;
} else {
    header('Location: ../index.php');
    exit;
}
