<?php

require_once 'db.php';
require_once 'util.php';

$db = new Database;
$util = new Util;

// Handle Add New User Ajax Request
if (isset($_POST['add'])) {

    $tdate          = $util->testInput($_POST['tdate']);
    $rname          = $util->testInput($_POST['rname']);
    $rphone         = $util->testInput($_POST['rphone']);
    $sname          = $util->testInput($_POST['sname']);
    $sphone         = $util->testInput($_POST['sphone']);
    $code           = $util->testInput($_POST['code']);
    $provider       = $util->testInput($_POST['provider']);
    $cod            = $util->testInput($_POST['cod']);
    $wallet         = $util->testInput($_POST['wallet']);

    if ($db->insert($tdate, $rname, $rphone, $sname, $sphone, $code, $provider, $cod, $wallet)) {



        echo $util->showMessage('success', 'User inserted successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}

// Handle Fetch All express Ajax Request
if (isset($_GET['read'])) {
    $express = $db->read();
    $output = '';
    if ($express) {
        foreach ($express as $row) {

            /*



*/


            if ($row['provider'] == "THP") {
                $provider = "<img src='https://infinitybike64.files.wordpress.com/2013/01/559000000134902.jpeg' height='50'/>";
            }
            if ($row['provider'] == "DHL") {
                $provider = "<img src='https://www.dhl.com/content/dam/dhl/en/express/express_logo.png' height='50'/>";
            }
            if ($row['provider'] == "FLA") {
                $provider = "<a href='https://www.flashexpress.co.th/tracking/?se=" . $row['code'] . "' target='_blink'><img src='https://fe-pro.oss-ap-southeast-1.aliyuncs.com/ard/images/web/logo%402x.png' height='25' border=0/></a>";
            }


            $output .= '<tr  style="text-align:left">
                      <td>' . $row['tdate'] . '<br>
                      <a href="fla_auto.php?tk=' . $row['code'] . '" class="btn btn-success btn-sm rounded-pill py-0">ดึงสถานะ</a>
                      
                      
                      </td>
                      <td style="width:30%;">' . $row['state'] . '</td>
                      <td>' . $provider . " " . $row['code'] . '</td>
                      <td>' . $row['cod'] . '</td>
                      <td>' . $row['sname'] . '<br>' . $row['sphone'] . '</td>
                      <td>' . $row['rname'] . '<br>' . $row['rphone'] . '</td>
                      <td>
                        <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editUserModal">Edit</a>

                        <a href="#" id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                      </td>
                    </tr>';
        }
        echo $output;
    } else {
        echo '<tr>
              <td colspan="6">No express Found in the Database!</td>
            </tr>';
    }
}

// Handle Edit User Ajax Request
if (isset($_GET['edit'])) {
    $id = $_GET['id'];

    $express = $db->readOne($id);
    echo json_encode($express);
}

// Handle Update User Ajax Request
if (isset($_POST['update'])) {
    $id = $util->testInput($_POST['id']);
    $tdate          = $util->testInput($_POST['tdate']);
    $rname          = $util->testInput($_POST['rname']);
    $rphone         = $util->testInput($_POST['rphone']);
    $sname          = $util->testInput($_POST['sname']);
    $sphone         = $util->testInput($_POST['sphone']);
    $code           = $util->testInput($_POST['code']);
    $provider       = $util->testInput($_POST['provider']);
    $cod            = $util->testInput($_POST['cod']);
    $wallet         = $util->testInput($_POST['wallet']);

    if ($db->update($id, $tdate, $rname, $rphone, $sname, $sphone, $code, $provider, $cod, $wallet)) {
        echo $util->showMessage('success', 'updated successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}

// Handle Delete User Ajax Request
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    if ($db->delete($id)) {
        echo $util->showMessage('info', 'User deleted successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong!');
    }
}
