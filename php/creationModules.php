<?php

include_once 'DB.inc.php';
include_once 'Modules.inc.php';

//Fichire moyenne
function creationModules($donnees){
	$regex = "/^(Bonus)|(^(BIN)[RS]\d{3})$/";
	$lstModules = array();
	$nomValeur = array("etudid", "code_nip");
	for($lig = 1; $lig < count($donnees); $lig++){
		$lstValeur = array();
		$lstLibelle = array();
		
		for($col = 0; $col < count($donnees[0]); $col++){
			if($donnees[0][$col] == $nomValeur[0]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			if($donnees[0][$col] == $nomValeur[1]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			$estComp = preg_match($regex, $donnees[0][$col]) && !in_array($donnees[0][$col], $lstLibelle);

			if($estComp){
				$lstValeur[2] = $donnees[0][$col];
				$lstValeur[3] = $donnees[$lig][$col] == "" ? null : $donnees[$lig][$col];
				$module = new Modules($lstValeur[0], $lstValeur[1], $lstValeur[3], $lstValeur[2]);

				array_push($lstLibelle, $donnees[0][$col]);
				array_push($lstModules, $module);
			}

		}

	}
	$DB = DB::getInstance();

	$DB->insertModule($lstModules);
}