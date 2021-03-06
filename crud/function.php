<?php

function upload_image($code, $id)
{
    if (isset($_FILES["product_photo"])) {
        $extension = explode('.', $_FILES['product_photo']['name']);
        $new_name = $code . '.' . $extension[1];
        $destination = '../products/uploads/' . $id . '/' . $new_name;
        move_uploaded_file($_FILES['product_photo']['tmp_name'], $destination);
        return $new_name;
    }
}

function get_image_name($user_id)
{
    include('db.php');
    $statement = $connection->prepare("SELECT product_photo FROM tb_products WHERE id = '$user_id'");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row["product_photo"];
    }
}

function get_total_all_records()
{
    include('db.php');
    $statement = $connection->prepare("SELECT * FROM tb_products");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}
