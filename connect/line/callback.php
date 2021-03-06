<?php

require_once('../include/config.inc.php');

// require_once('./config.php');

// if (!session_id()) {
//     session_start();
// }

$code = $_GET['code'];
// echo '$code= ' . $code . '<br /><br />';

$state = $_GET['state'];
// echo '$state= ' . $state . '<br /><br />';

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
$client_id = '1561471946';
$client_secret = 'ad6061c4a823064d372fd1c203799d8a';
$redirect_uri = 'https://connect.isuzusales.net/iks/line/callback.php';

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
     echo '<meta http-equiv="Refresh" content="0;https://connect.isuzusales.net'.$state.'?error">';
}else{

    $val = explode(".", $res->id_token);
    $data_json = base64_decode($val[1]);
    $data = json_decode($data_json);
    // print_r($data);

        require_once('../include/config.inc.php');
        require_once('../include/function.inc.php');

    $check  = mysql_query("SELECT `ID`,`LINE_ID` FROM `$tableCustomers` WHERE `LINE_ID` = '".$data->sub."' ");
    $num = mysql_num_rows($check); 
    

        $arrData = array();
        $arrData['LINE_NAME']   = $data->name;
        $arrData['LINE_PHOTO']  = $data->picture;        
        $arrData['EMAIL']       = $data->email;        
        $arrData['EDITDATE']    = date("Y-m-d H:i:s");

    if($num==''){
        $arrData['LINE_ID']     = $data->sub;
        $arrData['DATE']        = date("Y-m-d H:i:s");
        $arrData['DEL']    = '0';

        $sql = sqlCommandInsert($tableCustomers,$arrData);
        $query = mysql_query($sql);    
        $userId = mysql_insert_id();    
    }else{

        $sql = sqlCommandUpdate($tableCustomers,$arrData," `LINE_ID` = '".$data->sub."' ");
        $query = mysql_query($sql);

        while($result = mysql_fetch_array($check)) {
            $userId = $result['ID'];
        }

    }
        


    // $cookie_name = "isuzuslaes_cis";
    $cookie_value = base64_encode($userId);
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    // echo $num."<br>";
    // echo $userId;

    echo '<meta http-equiv="Refresh" content="0;https://connect.isuzusales.net'.$state.'">';
    
}

?>
