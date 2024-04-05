<?php

include_once 'DB.inc.php';
include_once 'Resultat.inc.php';

//Fichier Jury
function creationResultat($values){
	$lstResultat = array();
	$lstComp = array();
	$semestre = null;
	$nomVal = array("etudid", "code_nip", "/^BIN\d{2}$/", "Rg", "Moy", "Abs");

	//On récupère les compétences
	for($col = 0; $col < count($values[0]); $col++){
		if(preg_match($nomVal[2], $values[0][$col])){
			array_push($lstComp, $values[0][$col]);

			$chaine = $values[0][$col];
			$semestre = $chaine[3];
		}
	}
	
	for($lig = 1; $lig < count($values); $lig++){
		$lstValeur = array();
		for($col = 0; $col < count($values[0]); $col++){
			if($nomVal[0] == $values[0][$col]){
				array_push($lstValeur, $values[$lig][$col]);
			}
			else if($nomVal[1] == $values[0][$col]){
				array_push($lstValeur, $values[$lig][$col]);
			}
			else if($nomVal[3] == $values[0][$col]){
				array_push($lstValeur, $values[$lig][$col]);
			}
			else if($nomVal[4] == $values[0][$col]){
				array_push($lstValeur, $values[$lig][$col]);
			}
			else if($nomVal[5] == $values[0][$col]){
				array_push($lstValeur, $values[$lig][$col]);
			}
		}

		$resultat = new Resultat($lstValeur[0], $lstValeur[1], $semestre, $lstComp, $lstValeur[2], $lstValeur[4], $lstValeur[3], false);
		array_push($lstResultat, $resultat);
	}
	$DB = DB::getInstance();

	$DB->insertResultat($lstResultat);
}

