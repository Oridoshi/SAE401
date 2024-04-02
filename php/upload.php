<?php
// Vérifier si un fichier a été envoyé
if(isset($_FILES['file'])) {
    $target_dir = "../donnees/"; // Répertoire où vous souhaitez enregistrer les fichiers
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Déplacer le fichier vers le répertoire de destination
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "Le fichier " . htmlspecialchars(basename($_FILES["file"]["name"])) . " a été téléchargé.";
    } else {
        echo "Désolé, une erreur s'est produite lors du téléchargement du fichier.";
    }
} else {
    throw new Exception("Aucun fichier n'a été envoyé.");
}