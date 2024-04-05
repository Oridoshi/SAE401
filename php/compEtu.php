<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

error_reporting(E_ALL);

include_once 'DB.inc.php';

$db = DB::getInstance();
$code = $_GET['code'];
$semmestre = $_GET['semmestre'];

for($i = 1; $i <= 6; $i++) {
    $comp = "BIN" . $semmestre . $i;
    $val[] = $db->getCompEtu($code, $comp);
}

echo json_encode($val);

