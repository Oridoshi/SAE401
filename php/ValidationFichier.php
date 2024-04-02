<?php 


function fichierValide()
{
	$fichiers = array(
        'commSemmestre1', 'jurySemmestre1', 'commSemmestre2', 'jurySemmestre2',
        'commSemmestre3', 'jurySemmestre3', 'commSemmestre4', 'jurySemmestre4',
        'commSemmestre5', 'jurySemmestre5', 'commSemmestre6', 'jurySemmestre6', 'coeff'
    );

    // Boucler à travers les champs de type "file" et vérifier si l'un d'entre eux est rempli
    $fichierRempli = false;
    foreach ($fichiers as $fichier) {
        if (!empty($_FILES[$fichier]['name'])) {
            $fichierRempli = true;
            break; // Sortir de la boucle dès qu'un fichier est trouvé
        }
    }

	if($fichierRempli) {
		echo 'oui';
	}
	else {
		echo 'nan';
	}
}

fichierValide();

?>