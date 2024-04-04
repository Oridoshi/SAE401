<?php

include_once 'DB.inc.php';
include_once 'CompetenceModule.inc.php';

function creationCompetenceModule($donnees){
	$lstCompMod = array();
	$regex = "/(^(BIN)[RS]\d{3})$/";

	for($lig = 0; $lig < count($donnees); $lig++){
		if(preg_match($regex, $donnees[$lig][0])) {
			$module = $donnees[$lig][0];
			
			for($col = 1; $col < count($donnees[0]); $col++){
				$comp = "BIN" . $module[4] . $col;
				$coeff = trim($donnees[$lig][$col]) == "" ? null : $donnees[$lig][$col];

				if($coeff != null){
					$competenceMod = new CompetenceModule($comp, $module, $coeff);
					array_push($lstCompMod, $competenceMod);
				}
			}

		}
	}
	$DB = DB::getInstance();

	$DB->insertCompetenceModule($lstCompMod);
}