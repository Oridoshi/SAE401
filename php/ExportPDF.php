<?php
require 'DB.inc.php';
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
    $id_etu = $donnees_post['id_etu'];

    // Créer le PDF à partir du contenu HTML
    creerPdf($id_etu);
} else {
    // Répondre avec un code d'état HTTP approprié si la méthode n'est pas POST
    http_response_code(405);
}

function creerPdf($id_etu) {
	$db = DB::getInstance();

	$etudiant = $db->selectEtudiant($id_etu);
	/*$resultats = array();

	for ($annee = 1; $annee <= 3; $annee++) {
        // Boucle sur les compétences
		$resultats[] = $annee;
        for ($competence = 0; $competence < 6; $competence++) {
            // Appel de la méthode selectMoyEtu pour récupérer la moyenne pour cette compétence et cette année
            $resultats[$annee][$competence] = $db->selectMoyEtu($etudiant, $annee, $competence);
        }
    }

	error_log($resultats);*/

	// Vérifier si l'étudiant a été trouvé
    if ($etudiant) {
        // Initialiser un tableau pour stocker les données des étudiants
        $donnees_etudiant = array();

        // Parcourir chaque étudiant trouvé
        foreach ($etudiant as $etu) {
            // Récupérer les informations nécessaires de l'étudiant
            $donnees_etudiant[] = array(
                'annee' => $etu->getAnnee(),
                'nom' => $etu->getNom(),
                'prenom' => $etu->getPrenom(),
                'parcours' => $etu->getParcours()
            );
        }

        // Renvoyer les données de l'étudiant au format JSON
        echo json_encode($donnees_etudiant);
	}
}