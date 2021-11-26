<?php

require_once 'db.php';
require_once 'util.php';

$db = new Database;
$util = new Util;

// Handle Add New User Ajax Request
if (isset($_POST['add'])) {
    $sname          = $util->testInput($_POST['sname']);
    $sphone         = $util->testInput($_POST['sphone']);
    $rname          = $util->testInput($_POST['rname']);
    $rphone         = $util->testInput($_POST['rphone']);
    $tdate          = $util->testInput($_POST['tdate']);
    $trackcode      = $util->testInput($_POST['trackcode']);
    $rphone         = $util->testInput($_POST['rphone']);
    $cod            = $util->testInput($_POST['cod']);
    $wallet         = $util->testInput($_POST['wallet']);
    $status         = $util->testInput($_POST['status']);

    if ($db->insert($tdate, $rname, $rphone, $sname, $sphone, $trackcode, $provider, $cod, $wallet, $status)) {
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
id
tdate
cs_name
cs_phone
ag_name
ag_phone
track_code
express_provider
COD
WALLET
status


*/




            $output .= '<tr>
                      <td>' . $row['tdate'] . '</td>
                      <td>-</td>
                      <td>' . $row['provider'] . "/" . $row['trackcode'] . '</td>
                      <td>' . $row['first_name'] . '</td>
                      <td>' . $row['last_name'] . '</td>
                      <td>' . $row['phone'] . '</td>
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
    $fname = $util->testInput($_POST['fname']);
    $lname = $util->testInput($_POST['lname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);

    if ($db->update($id, $fname, $lname, $email, $phone)) {
        echo $util->showMessage('success', 'User updated successfully!');
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
