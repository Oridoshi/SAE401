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

// Vérifier si la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données JSON envoyées depuis le script JavaScript
    $donnees_post = json_decode(file_get_contents('php://input'), true);
    $contenuHTML = $donnees_post['contenuHTML'];

    // Créer le PDF à partir du contenu HTML
    creerPdf($contenuHTML);
} else {
    // Répondre avec un code d'état HTTP approprié si la méthode n'est pas POST
    http_response_code(405);
}

function creerPdf($contenuHTML) {
    // Créer une nouvelle instance de TCPDF
    $pdf = new TCPDF();

    // Ajouter une nouvelle page au PDF
    $pdf->addPage();

	//$contenuHTML = preg_replace('<script>(.*?)</script>', '', $contenuHTML);

    // Écrire le contenu HTML dans le PDF
    $pdf->writeHTML($contenuHTML);

    // Renvoyer le PDF généré en réponse à la requête
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="output.pdf"');
    echo $pdf->Output('output.pdf', 'S');
}
?>
