<?php
header('Access-Control-Allow-Origin: *');
include_once 'DB.inc.php';
include_once 'Etudiant.inc.php';

$db = DB::getInstance();
$return = $db->selectEtudiants();

echo json_encode($return);