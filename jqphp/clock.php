<?php
date_default_timezone_set('asia/bangkok');
echo date("Y-m-d");
echo ":: " . date('H:i:s');

$Year = date("Y") + 543;
$Nyear = substr($Year, -2);

echo "<br>";
echo $Nyear;
