<?php
require_once('config.php');

if (!session_id()) {
    session_start();
}

$base_url = "https://access.line.me/oauth2/v2.1/authorize";
$client_id = '1561471946';
$redirect_uri = 'https://connect.isuzusales.net/iks/line/callback.php';

$_SESSION['_line_state'] = sha1(time());

$query = "";
$query .= "response_type=" . urlencode("code") . "&";
$query .= "client_id=" . urlencode($client_id) . "&";
$query .= "redirect_uri=" . urlencode($redirect_uri) . "&";
$query .= "state=" . urlencode($_SESSION['_line_state']) . "&";
$query .= "scope=" . urlencode("email profile openid") . "&bot_prompt=normal";

$url = $base_url . '?' . $query;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=10.0, user-scalable=yes">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin: 10px 0;">
    <div class="panel panel-default">
        <div class="panel-heading">
           เชื่อมต่อระบบ
        </div>
        <div class="panel-body">
            <p>ดำเนินการเชื่อมต่อ</p>
            <a href="<?php echo $url; ?>">
                <img src="img/btn_login_base.png">
            </a>
        </div>
    </div>
</div>

</body>
</html>

