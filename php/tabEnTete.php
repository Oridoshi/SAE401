<?php
header('Access-Control-Allow-Origin: *');
include_once 'DB.inc.php';

$db = DB::getInstance();
$enTete = $db->selectResultats();

echo json_encode($enTete);