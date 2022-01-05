<?php
//invoice.php  
include('config.php');

if (isset($_POST["add"])) {
    $order_no = $_POST['order_no'];
    $comma = preg_replace('/,\\s*/', "', '", $_POST["stateandmileslist"]);
    $row = preg_replace('/\\n/', "'), \n('", $comma);
    $query = "insert into tis_satesmiles (states, miles) values ('" . $row . "')";
    $statement = $dbh->prepare($query);
    $statement->execute();
}
