<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$destination_folder = '../telechargement/';

if(isset($_FILES['fichier']) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['fichier']['tmp_name'];
    $name = $_FILES['fichier']['name'];

    if(move_uploaded_file($tmp_name, $destination_folder . $name)) {
        http_response_code(200);
        echo 'Fichier téléchargé avec succès';
    } else {
        http_response_code(500);
        echo 'Erreur de téléchargement du fichier';
    }
} else {
    http_response_code(400);
    echo 'Une erreur s\'est produite';
}


