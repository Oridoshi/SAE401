<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

include_once 'DB.inc.php';

$regex = 'BIN.*' . $_GET['semmestre'] . '\d+';

$db = DB::getInstance();

$return = $db->getModules($_GET['code'], $regex);


echo json_encode($return);