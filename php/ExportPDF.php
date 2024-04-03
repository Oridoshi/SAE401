<?php
// Inclure la bibliothèque PHP Spreadsheet
require 'vendor/autoload.php';
require 'DB.inc.php';

use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Récupérer le contenu HTML envoyé depuis JavaScript
$donnees_post = json_decode(file_get_contents('php://input'), true);
$contenuHTML = $donnees_post['contenuHTML'];
$nomPrenom = $donnees_post['nomPrenom'];

$etud = array(/* nom, prenom, annee, parcours(A, B, C)*/);
$res1 = array(/* abs, moyenne, rang */);
$res2 = array(/* abs, moyenne, rang */);
$res3 = array(/* abs, moyenne, rang */);

$db = DB::getInstance();

$etudiants = $db->getEtudiants();
$resultats = $db->getResultats();

foreach ($etudiants as $etudiant) {
	if($etudiant->prenom === $nomPrenom['prenomEleve'] && $etudiant->nom === $nomPrenom['nomEleve']){
		array_push($etud, $etudiant->nom, $etudiant->prenom, $etudiant->annee, $etudiant->parcours);
	}
}


// Créer une nouvelle instance de la classe Spreadsheet
$spreadsheet = new Spreadsheet();

// Charger le contenu HTML dans la feuille de calcul
$spreadsheet->getActiveSheet()->fromHtml($contenuHTML);

// Créer un objet PDF Writer
$writer = new Pdf($spreadsheet);

// Écrire le PDF dans un flux temporaire
$filename = tempnam(sys_get_temp_dir(), 'pdf');
$writer->save($filename);

// Renvoyer le PDF généré en réponse à la requête
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="output.pdf"');
readfile($filename);
