<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
include_once 'DB.inc.php';
include_once 'Etudiant.inc.php';


$db = DB::getInstance();
$return = $db->getEtudiants($_GET['annee']);

echo json_encode($return);