<?php
header( 'Access-Control-Allow-Origin: *' );

include 'DB.inc.php';

$vals = DB::getInstance()->getAnnees();

echo json_encode($vals);