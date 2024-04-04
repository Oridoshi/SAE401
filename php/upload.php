<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

include_once("lectureFIchier.php");
include_once("creationEtudiant.php");
include_once("creationResultat.php");
include_once("creationCompetence.php");
include_once("creationModules.php");
include_once("Etudiant.inc.php");

// Vérifier si un fichier a été envoyé
if(isset($_FILES['file'])) {
    $target_dir = "../donnees/"; // Répertoire où vous souhaitez enregistrer les fichiers
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Déplacer le fichier vers le répertoire de destination
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo traitementFichier($target_file, $_POST["source"]);
        // echo "Le fichier " . htmlspecialchars(basename($_FILES["file"]["name"])) . " a été téléchargé.";

        //traitement du fichier
        
    } else {
        echo "Désolé, une erreur s'est produite lors du téléchargement du fichier.";
    }
} else {
    throw new Exception("Aucun fichier n'a été envoyé.");
}


/** CREATION DES OBJETS
 * - Etudiant   : utilise le fichier moyenne ou jury
 * - Resultat   : utilise le fichier moyenne
 * - Competence : utilise le fichier jury
 * - Modules    : utilise le fichier moyenne
 */

function traitementFichier($file, $source) {
    $regexJury  = "/(jury)/";
    $regexCoeff = "/(coeff)/";

    if(preg_match($regexJury, $source)) {
        $fichierLue = lectureFichier($file);
        creationEtudiant($fichierLue, $_POST["promo"]);
        creationCompetence($fichierLue);
    } else if(preg_match($regexCoeff, $source)) {
        $source = "coeff";
    } else {
        $fichierLue = lectureFichier($file);
        creationEtudiant($fichierLue, $_POST["promo"]);
        creationResultat($fichierLue);
        creationModules($fichierLue);
    }
}