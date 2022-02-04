<?php
include_once("../include/config.inc.php");


setcookie($cookie_name, '', time() - (86400 * 30), "/"); // 86400 = 1 day
unset($cookie_name);
echo '<meta http-equiv="Refresh" content="0;https://connect.isuzusales.net/iks/index.php">';
// echo $_COOKIE[$cookie_name];

?>