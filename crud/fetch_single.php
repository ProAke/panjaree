<?php
include('db.php');
include('function.php');
if (isset($_POST["id"])) {
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM tb_products 
  WHERE id = '" . $_POST["id"] . "' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output["code"] = $row["code"];
        $output["product_name"] = $row["product_name"];
        if ($row["image"] != '') {
            $output['user_image'] = '<img src="upload/' . $row["tb_products"] . '" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="' . $row["image"] . '" />';
        } else {
            $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
        }
    }
    echo json_encode($output);
}
