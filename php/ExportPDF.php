<?php
// Inclure la bibliothèque PHP TCPDF
require_once 'DB.inc.php';
include_once 'Etudiant.inc.php';

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
	$donnees_post = json_decode(file_get_contents('php://input'), true);
	if(isset($donnees_post['id_etu'])) {
		$id_etu = $donnees_post['id_etu'];

		envoieDonnees($id_etu);
	}
	if(isset($donnees_post['contenuHTML'])){
		// Récupérer les données JSON envoyées depuis le script JavaScript
		$contenuHTML = $donnees_post['contenuHTML'];

		// Créer le PDF à partir du contenu HTML
		creerPdf($contenuHTML);
	}

} else {
	// Répondre avec un code d'état HTTP approprié si la méthode n'est pas POST
	http_response_code(405);
}


function envoieDonnees($id_etu) {
    // Initialiser les tableaux pour stocker les données
    $data = array();
    $etu = array();

    $db = DB::getInstance();

    // Récupérer l'étudiant
    $etudiant = $db->selectEtudiant($id_etu);

    // Vérifier si un étudiant a été trouvé
    if ($etudiant) {
        // Parcourir chaque étudiant
        foreach ($etudiant as $etud) {
            // Créer un tableau associatif avec les attributs spécifiés
            $etuData = array(
                'annee' => $etud->getAnnee(),
                'nom' => $etud->getNom(),
                'prenom' => $etud->getPrenom(),
                'cursus' => $etud->getCursus(),
                'parcours' => $etud->getParcours()
            );
            

            // Ajouter les données de l'étudiant au tableau des données des étudiants
            $etu[] = $etuData;
        }

        // Ajouter le tableau des données des étudiants au tableau principal $data
        $data['etudiants'] = $etu;


        // Convertir le tableau en JSON et le renvoyer
        echo json_encode($data);
    } else {
        // Si aucun étudiant n'est trouvé, renvoyer un message d'erreur
        echo json_encode(array('error' => 'Aucun étudiant trouvé avec cet ID'));
    }
}

function creerPdf($contenuHTML) {
    // Créer un nouvel objet DOMDocument
    $dom = new DOMDocument();

    // Charger le contenu HTML dans l'objet DOMDocument
    $dom->loadHTML($contenuHTML);

    // Sélectionner l'élément contenant les données
    $dataDiv = $dom->documentElement;

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

