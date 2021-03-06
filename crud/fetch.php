<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM $tbProducts ";
if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE code LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR product_name LIKE "%' . $_POST["search"]["value"] . '%" ';
}
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id DESC ';
}
if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach ($result as $row) {
    $image = '';
    if ($row["product_photo"] != '') {
        $image = '<img src="../products/uploads/' . $row['id'] . '/' . $row["product_photo"] . '" class="img-thumbnail" width="50"/>';
    } else {
        $image = '<img src="../products/uploads/free-upload.jpg" class="img-thumbnail" width="50"/>';
    }
    $sub_array = array();
    $sub_array[] = $image;
    $sub_array[] = $row["code"];
    $sub_array[] = $row["product_name"];
    $sub_array[] = $row["size_ss"];
    $sub_array[] = $row["size_s"];
    $sub_array[] = $row["size_m"];
    $sub_array[] = $row["size_l"];
    $sub_array[] = $row["size_xl"];
    $sub_array[] = $row["size_xxl"];
    $sub_array[] = $row["size_3xl"];


    $sub_array[] = '<button type="button" name="update" id="' . $row["id"] . '" class="btn btn-warning btn-xs update">แก้ไข</button>';
    $sub_array[] = '<button type="button" name="delete" id="' . $row["id"] . '" class="btn btn-danger btn-xs delete">ลบ</button>';
    $data[] = $sub_array;
}
$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $filtered_rows,
    "recordsFiltered" => get_total_all_records(),
    "data"    => $data
);
echo json_encode($output);
