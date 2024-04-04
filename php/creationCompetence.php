<?php

include_once 'DB.inc.php';
include_once 'Competence.inc.php';

//Fichier Jury
function creationCompetence($values){
    $lstCompetence = array();
    $nomVal = array("etudid", "code_nip", "/^BIN\d{2}$/");
    
    for($lig = 1; $lig < count($values); $lig++){
        $lstValeur = array();
        for($col = 0; $col < count($values[0]); $col++){
            //idEtu
            if($nomVal[0] == $values[0][$col]){
                array_push($lstValeur, $values[$lig][$col]);
            }
            //codeEtu
            else if($nomVal[1] == $values[0][$col]){
                array_push($lstValeur, $values[$lig][$col]);
            }
            //idComp - moyenne - recommandation
            else if(preg_match($nomVal[2], $values[0][$col])){
                //idComp
                $lstValeur[2] = $values[0][$col];
                //moyenne
                $lstValeur[3] = $values[$lig][$col];
                //recommandation
                $lstValeur[4] = $values[$lig][$col+1];

                //ajout de la competence
                $competence = new Competence($lstValeur[0], $lstValeur[1], $lstValeur[2], $lstValeur[3], $lstValeur[4], null);
                array_push($lstCompetence, $competence);
            }
        }
    }
    $DB = DB::getInstance();

    $DB->insertCompetence($lstCompetence);
}