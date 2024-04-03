<?php
// Inclure la bibliothèque PHP TCPDF
require 'tcpdf/tcpdf.php';

// Autoriser toutes les origines pour CORS
header("Access-Control-Allow-Origin: *");

// Vérifier si la méthode de la requête est OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Répondre avec les en-têtes CORS appropriés
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Max-Age: 86400"); // Cache preflight pendant 1 jour
    exit;
}

error_log("arriver dans le php");

// Vérifier si la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("ya une error la");
    if(isset($_POST['id_etu'])) {
        $donnees_post = json_decode(file_get_contents('php://input'), true);
        $id_etu = $donnees_post['id_etu'];

        envoieDonnees($id_etu);
    }
    if(isset($_POST['contenuHTML'])){
        // Récupérer les données JSON envoyées depuis le script JavaScript
        $donnees_post = json_decode(file_get_contents('php://input'), true);
        $contenuHTML = $donnees_post['contenuHTML'];

        // Créer le PDF à partir du contenu HTML
        creerPdf($contenuHTML);
    }
   
} else {
    // Répondre avec un code d'état HTTP approprié si la méthode n'est pas POST
    http_response_code(405);
}

function envoieDonnees($id_etu) {
    $data = array();
    $etu = array();
    $resBut1 = array();
    $resBut2 = array();
    $resBut3 = array();

    $db = DB::getInstance();

    $resultatBd = $db->selectEtudiant($id_etu);

    array_push($data, 2);
    array_push($data, $etu);
    array_push($data, $resBut1);
    array_push($data, $resBut2);
    array_push($data, $resBut3);
    
    echo json_encode($data);
}

function creerPdf($contenuHTML) {
    // Charger le contenu du fichier HTML
    $htmlContent = file_get_contents($contenuHTML);

    // Créer un nouvel objet DOMDocument
    $dom = new DOMDocument();

    // Charger le contenu HTML dans l'objet DOMDocument
    $dom->loadHTML($htmlContent);

    // Sélectionner l'élément contenant les données
    $dataDiv = $dom->getElementById('data');

    // Créer un tableau pour stocker les données
    $dataArray = [];

    // Parcourir les éléments enfants de l'élément de données
    foreach ($dataDiv->childNodes as $node) {
        if ($node->nodeType === XML_ELEMENT_NODE) {
            // Récupérer le texte des éléments enfants et divisez-le en clé et valeur
            $text = trim($node->textContent);
            $parts = explode(':', $text);
            $key = trim($parts[0]);
            $value = trim($parts[1]);

            // Ajouter la paire clé-valeur au tableau
            $dataArray[$key] = $value;
        }
    }

    // Convertir le tableau en JSON
    $jsonData = json_encode($dataArray);

    // Afficher le JSON
    echo $jsonData;
}
