<?php
include 'DB.inc.php';

	function creationCompetenceModule($values){
		$lstCompetence = array();
		$nomVal = array("etudid", "code_nip", "C1", "C1", "coef");
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
				array_push( $ldtValeur, "inconnu");
			}

			$competenceMod = new CompetenceModule($lstValeur[0], $lstValeur[1], $lstValeur[2], $lstValeur[3], $lstValeur[4]);
			array_push($lstCompetence, $competenceMod);


		}
		ajoutBDD($lstCompetence);

	}

	function ajoutBDD($lstCompetence) {
		$db = DB::getInstance();
		if($db){
			$requeteSelect = 'SELECT * FROM CompetenceModules WHERE id_etu = ?';
			$requeteUpdate = 'INSERT INTO CompetenceModules VALUES(?, ?, ?, ?, ?)';

			for($i = 0; $i < count($lstCompetence); $i++){
				$resultat = $db->execQuery($requeteSelect, $lstCompetence[$i]->getIdEtudiant(), 'Competence');
				if(empty($resultat)){
					$tparam = array($lstCompetence[$i]->getIdEtu(), $lstCompetence[$i]->getCodeEtu(), $lstCompetence[$i]->getIdComp(), $lstCompetence[$i]->getIdModule(), 
									$lstCompetence[$i]->getCoef());
					$db->execMaj($requeteUpdate, $tparam);
				}
			}
		}
	}