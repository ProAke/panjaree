<?php

require_once('../include/config.inc.php');

// require_once('./config.php');

// if (!session_id()) {
//     session_start();
// }

$code = $_GET['code'];
//echo '$code= ' . $code . '<br /><br />';

$state = $_GET['state'];
//echo '$state= ' . $state . '<br /><br />';

// $session_state = $_SESSION['_line_state'];
// unset($_SESSION['_line_state']);
// if ($session_state !== $state) {
//     echo 'アクセスエラー';
//     exit;
// }

//**************
// 各種値の設定
//**************
$base_url = "https://api.line.me/oauth2/v2.1/token";
$client_id = '1656624584';
$client_secret = 'ce1705868228c444e9c92ef92fc2b9e2';
$redirect_uri = 'https://panjaree.uarea.in/line/callback.php';

$url = "https://api.line.me/oauth2/v2.1/token";

//----------------------------------------
// POSTパラメータの作成
//----------------------------------------
$query = "";
$query .= "grant_type=" . urlencode("authorization_code") . "&";
$query .= "code=" . urlencode($code) . "&";
$query .= "redirect_uri=" . urlencode($redirect_uri) . "&";
$query .= "client_id=" . urlencode($client_id) . "&";
$query .= "client_secret=" . urlencode($client_secret) . "&";

//--------------------
// HTTPヘッダーの設定
//--------------------
$header = array(
    "Content-Type: application/x-www-form-urlencoded",
    "Content-Length: " . strlen($query),
);

//--------------------------------
// コンテキスト（各種情報）の設定
//--------------------------------
$context = array(
    "http" => array(
        "method"        => "POST",
        "header"        => implode("\r\n", $header),
        "content"       => $query,
        "ignore_errors" => true,
    ),
);

//---------------------
// id token を取得する
//---------------------
$res_json = file_get_contents($url, false, stream_context_create($context));

//----------------------------------
// 取得するデータを展開して表示する
//----------------------------------

// 取得したjsonデータをオブジェクト化
$res = json_decode($res_json);
// echo '$res= ';
// print_r($res); // LINEから取得したデータの表示
// echo '<br /><br />';

// エラーを取得
if (isset($res->error)) {
    // echo 'ログインエラーが発生しました。<br />';
    echo "error: " . $res->error . '<br />';
    echo $res->error_description;
    // exit;
    //echo '<meta http-equiv="Refresh" content="0;https://panjaree.uarea.in' . $state . '?error">';
} else {

    $val = explode(".", $res->id_token);
    $data_json = base64_decode($val[1]);
    $data = json_decode($data_json);
    //print_r($data);

    require_once('../include/config.inc.php');
    require_once('../include/function.inc.php');

    $num = 0;

    $check = "SELECT `ID`,`LINE_ID` FROM `$tableMembersLogin` WHERE `LINE_ID` = '" . $data->sub . "' ";
    $rscheck = $conn->query($check);
    $num = $rscheck->num_rows;




    $arrData = array();
    $arrData['LINE_NAME']   = $data->name;
    $arrData['LINE_PHOTO']  = $data->picture;
    $arrData['EMAIL']       = $data->email;
    $arrData['EDITDATE']    = date("Y-m-d H:i:s");

    if ($num < 1) {


        //echo "Add New<br><Br>";
        $arrData['LINE_ID']     = $data->sub;
        $arrData['DATE']        = date("Y-m-d H:i:s");
        $arrData['DEL']    = '0';

        foreach ($arrData as $key => $value) {
            $arrFieldTmp[] = "`$key`";
            $arrValueTmp[] = "'$value'";
        }
        $strFieldTmp = implode(",", $arrFieldTmp);
        $strValueTmp = implode(",", $arrValueTmp);
        $query = "INSERT INTO `$tableMembersLogin`($strFieldTmp) VALUES($strValueTmp)";

        // echo $query . "<br>";

        $result = $conn->query($query);
        $userId = $conn->insert_id;
    } else {

        //  echo "Update";
        $Update = date("Y-m-d H:i:s");
        $strSql = "UPDATE `tb_members_login` SET `EDITDATE`='" . $Update . "' WHERE `LINE_ID` = '" . $data->sub . "'";
        $result = $conn->query($strSql);
        if ($line = $rscheck->fetch_assoc()) {
            $userId = $line['ID'];
            ///
        }
    }



    $cookie_name = "Panjaree_Office";
    $cookie_value = base64_encode($userId);
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    echo $strSql . "<br>";
    echo $userId . "<br>";
    echo $state;
    //echo '<meta http-equiv="Refresh" content="0;https://panjaree.uarea.in' . $state . '">';
}
