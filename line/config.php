<?php
// include 
if (array_shift(get_included_files()) !== __FILE__) {
    define("CLIENT_ID", '1656624584');
    define("CLIENT_SECRET", 'ce1705868228c444e9c92ef92fc2b9e2');
    define("REDIRECT_URI", 'https://panjaree.uarea.in/line/callback.php');
} else {
    echo 'Access Denied';
}
