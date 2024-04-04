<?php
header('Access-Control-Allow-Origin: *');
include_once 'DB.inc.php';
include_once 'Etudiant.inc.php';

$db = DB::getInstance();
$return = $db->getEtudiants($_GET['annee']);

echo json_encode($return);