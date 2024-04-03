<?php
include 'DB.inc.php';
include 'lectureFIchier.php';

//Fichire moyenne
function creationModules($donnees){
	$regex = "/^(Bonus)|(^(BIN)[RS]\d{3})$/";
	$lstModules = array();
	$nomValeur = array("etudid", "code_nip");
	for($lig = 1; $lig < count($donnees); $lig++){
		$lstValeur = array();
		
		
		for($col = 0; $col < count($donnees[0]); $col++){
			if($donnees[0][$col] == $nomValeur[0]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			if($donnees[0][$col] == $nomValeur[1]){
				array_push($lstValeur, $donnees[$lig][$col]);
			}
			$estComp = preg_match($regex, $donnees[0][$col]);

			if($estComp){
				$lstValeur[2] = $donnees[0][$col];
				$lstValeur[3] = $donnees[$lig][$col];
				$module = new Modules($lstValeur[0], $lstValeur[1], $lstValeur[2], $lstValeur[3], NULL);
				array_push($lstModules, $module);

			}

		}

	}
	
	return $lstModules;

}

// $test = creationModules(lectureFichier("../donnees/S1 FI moyennes.xlsx"));

// foreach($test as $modules){
// 	echo $modules->getIdetudiant()."<br>";
// 	echo $modules->getCodeEtu()."<br>";
// 	echo $modules->getIdModule()."<br>";
// 	echo $modules->getNotes()."<br>";
// }