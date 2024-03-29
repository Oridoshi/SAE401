<?php
include 'DB.inc.php';


function creationResultat($values){
	$lstResultat = array();
	$lstComp = array();
	$nomVal = array("etudid", "code_nip", "Cursus", array("C1", "C2","C3", "C4","C5", "C6","C1", "C2", "C3", "C4", "C5", "C6"), "Abs", "Rg", "Moy", "Alternant");
	$cpt = 0;
	$cptArray = 0;
	for($lig = 1; $lig < count($values); $lig++){
		$lstValeur = array();
		for($col = 0; $col < count($values[0]); $col++){
			if($cpt == 3){
				if($values[0][$col] == $nomVal[$cpt][$cptArray]){
					array_push( $lstComp, $values[$lig][$col] );
					$cptArray++;
				}
				if(count($lstComp) == 12){
					$cpt++;
					$col = 0;
					array_push( $lstValeur, $lstComp );
				}
			}
			else if($values[0][$col] == $nomVal[$cpt]){
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
			if(count($lstValeur) == 8){
				$col = count($values[0]);
			}

		}
		$cpt = 0;
		while(count($lstValeur) < 8) {
			array_push( $lstValeur, "inconnu");
		}
		$resultat = new Resultat($lstValeur[0], $lstValeur[1], $lstValeur[2], $lstValeur[3], $lstValeur[4], $lstValeur[5], $lstValeur[6], $lstValeur[7]);
		array_push($lstResultat, $resultat);


	}
	ajoutBDD($lstResultat);

}

function ajoutBDD($Resultats) {
	$db = DB::getInstance();
	if($db){
		$requeteSelect = 'SELECT * FROM Resultats WHERE id_etu = ? AND code_etu = ?';
		$requeteUpdate = 'INSERT INTO Resultats VALUES(?, ?, ?, ?, ?, ?, ?, ?)';

		for($i = 0; $i < count($Resultats); $i++){
			$resultat = $db->execQuery($requeteSelect, array($Resultats[$i]->getIdEtudiant(), $Resultats[$i]->getCodeEtu()), 'Resultat');
			if(empty($resultat)){
				$tparam = array($Resultats[$i]->getIdEtudiant(), $Resultats[$i]->getCodeEtu(), $Resultats[$i]->getIdResultat(), $Resultats[$i]->getIdComp(), 
								$Resultats[$i]->getRang(), $Resultats[$i]->getAbsence(),$Resultats[$i]->getMoyenne(), $Resultats[$i]->getAlternant());
				$db->execMaj($requeteUpdate, $tparam);
			}
		}
	}
}