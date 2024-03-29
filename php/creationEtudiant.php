<?php
include 'DB.inc.php';


function creationEtudiant($values){
	$lstEtudiants = array();
	$nomVal = array("etudid", "code_nip", "Nom", "Prenom", "Parcours", "TD", "TP", "Cursus", "Annee", "Avis");
	$cpt = 0;
	for($lig = 1; $lig < count($values); $lig++){
		$lstValeur = array();
		for($col = 0; $col < count($values[0]); $col++){
			if($values[0][$col] == $nomVal[$cpt]){
				if($values[$lig][$col] == "" || $values[$lig][$col] == null){
					array_push($lstValeur, "inconnu");
				}
				else{
					array_push($lstValeur, $values[$lig][$col]);
				}
				$cpt++;
				$col = 0;
			}
			if($col == count($values)-1){
				array_push($lstValeur,"inconnue");
				$col = 0;
				$cpt++;
			}
			if(count($lstValeur) == 10){
				$col = count($values[0]);
			}

		}
		$cpt = 0;
		while(count($lstValeur) < 10) {
			array_push( $etudiants, "inconnu");
		}
		$etudiant = new Etudiant($lstValeur[0], $lstValeur[1], $lstValeur[2], $lstValeur[3], $lstValeur[4], $lstValeur[5], $lstValeur[6], $lstValeur[7], $lstValeur[8], $lstValeur[9]);
		array_push($lstEtudiants, $etudiant);


	}
	ajoutBDD($lstEtudiants);

}

function ajoutBDD($lstEtudiants) {
	$db = DB::getInstance();
	if($db){
		$requeteSelect = 'SELECT * FROM Etudiant WHERE id_etu = ?';
		$requeteUpdate = 'INSERT INTO Etudiant VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

		for($i = 0; $i < count($lstEtudiants); $i++){
			$resultat = $db->execQuery($requeteSelect, $lstEtudiants[$i]->getIdetudiant(), 'Etudiant');
			if(empty($resultat)){
				$tparam = array($lstEtudiants[$i]->getIdetudiant(), $lstEtudiants[$i]->getCode_etu(), $lstEtudiants[$i]->getNom(), $lstEtudiants[$i]->getPenom(), $lstEtudiants[$i]->getParcours(),
							$lstEtudiants[$i]->getGroupeTD(),$lstEtudiants[$i]->getGroupeTP(), $lstEtudiants[$i]->getCursus(), $lstEtudiants[$i]->getAnnee(), $lstEtudiants[$i]->getAvis());
				$db->execMaj($requeteUpdate, $tparam);
			}
		}
	}
}