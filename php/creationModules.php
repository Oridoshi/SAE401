<?php
include 'DB.inc.php';

function creationModules($values){
	$lstModules = array();
	$nomVal = array("etudid", "code_nip", "id_module", "Note", "Lib");
	$cpt = 0;
	for($lig = 1; $lig < count($values); $lig++){
		$lstValeur = array();
		for($col = 0; $col < count($values[0]); $col++){
			if($cpt == 2){
				if(substr($values[0][$col],0, 3) === "BIN"){
					array_push($lstValeur, $values[0][$col]);
					array_push($lstValeur, $values[$lig][$col]);
					array_push($lstValeur, $values[0][$col]);
					$cpt = 5;
					$col = count($values[0]);
				}
			}
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
				array_push($lstValeur,"inconnu");
				$col = 0;
				$cpt++;
			}
			if(count($lstValeur) == 5){
				$col = count($values[0]);
			}

		}
		$cpt = 0;
		while(count($lstValeur) < 5) {
			array_push( $lstValeur, "inconnu");
		}

		$module = new Modules($lstValeur[0], $lstValeur[1], $lstValeur[2], $lstValeur[3], $lstValeur[4]);
		array_push($lstModules, $module);


	}
	ajoutBDD($lstModules);

}

function ajoutBDD($lstModules) {
	$db = DB::getInstance();
	if($db){
		$requeteSelect = 'SELECT * FROM Modules WHERE id_etu = ? AND code_etu = ?';
		$requeteUpdate = 'INSERT INTO Modules VALUES(?, ?, ?, ?, ?)';

		for($i = 0; $i < count($lstModules); $i++){
			$resultat = $db->execQuery($requeteSelect, array($lstModules[$i]->getIdetudiant(), $lstModules[$i]->getCodeEtu), 'Modules');
			if(empty($resultat)){
				$tparam = array($lstModules[$i]->getIdEtudiant(), $lstModules[$i]->getCodeEtu(), $lstModules[$i]->getIdModule(), $lstModules[$i]->getNotes(), $lstModules[$i]->getLibelle());
				$db->execMaj($requeteUpdate, $tparam);
			}
		}
	}
}