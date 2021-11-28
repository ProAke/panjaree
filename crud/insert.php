<?php
include('db.php');
include('function.php');
if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {
        $image = '';
        if ($_FILES["user_image"]["name"] != '') {
            $image = upload_image();
        }
        $statement = $connection->prepare("
   INSERT INTO $tbProducts (code, product_name, image) 
   VALUES (:code, :product_name, :image)
  ");
        $result = $statement->execute(
            array(
                ':code' => $_POST["code"],
                ':product_name' => $_POST["product_name"],
                ':image'  => $image
            )
        );
        if (!empty($result)) {
            echo 'Data Inserted';
        }
    }
    if ($_POST["operation"] == "Edit") {
        $image = '';
        if ($_FILES["user_image"]["name"] != '') {
            $image = upload_image();
        } else {
            $image = $_POST["hidden_user_image"];
        }
        $statement = $connection->prepare(
            "UPDATE users 
   SET first_name = :first_name, last_name = :last_name, image = :image  
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(
                ':first_name' => $_POST["first_name"],
                ':last_name' => $_POST["last_name"],
                ':image'  => $image,
                ':id'   => $_POST["user_id"]
            )
        );
        if (!empty($result)) {
            echo 'Data Updated';
        }
    }
}
