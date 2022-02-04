<?php
// include 
if (array_shift(get_included_files()) !== __FILE__) {
    define("CLIENT_ID", '1561471946');
    define("CLIENT_SECRET", 'ad6061c4a823064d372fd1c203799d8a');
    define("REDIRECT_URI", 'https://www.isuzusales.net/iks/line/callback.php');
} else {
    echo 'Access Denied';
}
