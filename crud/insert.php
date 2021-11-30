<?php
include('db.php');
include('function.php');
if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {
        $product_photo = '';
        if ($_FILES["product_photo"]["name"] != '') {
            $product_photo = upload_image();
        }
        $statement = $connection->prepare("
   INSERT INTO tb_products (code, product_name, product_photo) 
   VALUES (:code, :product_name, :product_photo)
  ");
        $result = $statement->execute(
            array(
                ':code' => $_POST["code"],
                ':product_name' => $_POST["product_name"],
                ':product_photo'  => $product_photo
            )
        );
        if (!empty($result)) {
            echo 'Data Inserted';
        } else {
            echo 'ไม่สามารถเพิ่มค่าได้';
        }
    }
    if ($_POST["operation"] == "Edit") {
        $product_photo = '';
        if ($_FILES["product_photo"]["name"] != '') {
            $product_photo = upload_image();
        } else {
            $product_photo = $_POST["hidden_product_photo"];
        }
        $statement = $connection->prepare(
            "UPDATE tb_products SET code = :code, product_name = :product_name, product_photo = :product_photo 
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(
                ':code' => $_POST["code"],
                ':product_name' => $_POST["product_name"],
                ':product_photo'  => $product_photo,
                ':id'   => $_POST["user_id"]
            )
        );
        if (!empty($result)) {
            echo 'Data Updated';
        }
    }
} else {
    echo 'ไม่สามารถทำรายการได้';
}
