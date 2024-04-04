<?php

include_once 'DB.inc.php';

//Fichier moyenne
function creationEtudiant($donnees, $promo){
	$nomValeur = array("etudid", "code_nip", "Nom", "Prénom", "Parcours", "TD", "TP", "Cursus");
	$lstEtudiant = array();
	$aNom = array();

	for($lig = 1; $lig < count($donnees); $lig++){
		$lstValeur = array();
		$aNom[$lig] = false;
		for($col = 0; $col < count($donnees[0]); $col++){
			if($donnees[0][$col] == $nomValeur[0]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			if($donnees[0][$col] == $nomValeur[1]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			if($donnees[0][$col] == $nomValeur[2] && !$aNom[$lig]){
				array_push($lstValeur, $donnees[$lig][$col]);
				$aNom[$lig] = true;
			}
			if($donnees[0][$col] == $nomValeur[3]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			if($donnees[0][$col] == $nomValeur[4]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			if($donnees[0][$col] == $nomValeur[5]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			if($donnees[0][$col] == $nomValeur[6]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			if($donnees[0][$col] == $nomValeur[7]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}

		}
		$etudiant = new Etudiant($lstValeur[0], $lstValeur[1], $lstValeur[2], $lstValeur[3], $lstValeur[4], $lstValeur[5], $lstValeur[6], $lstValeur[7], $promo, false);
		array_push($lstEtudiant, $etudiant);
	}
	$DB = DB::getInstance();

	$DB->insertEtudiant($lstEtudiant);
}
