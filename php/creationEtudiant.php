<?php
include 'DB.inc.php';
include 'lectureFIchier.php';


//fichier moyenne
	function creationEtudiant($donnees){
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
				if($donnees[0][$col] == $nomValeur[8]){
					array_push($lstValeur, $donnees[$lig][$col]);
				}
			}
			$etudiant = new Etudiant($lstValeur[0], $lstValeur[1], $lstValeur[2], $lstValeur[3], $lstValeur[4], $lstValeur[5], $lstValeur[6], $lstValeur[7], NULL, false);
			array_push($lstEtudiant, $etudiant);
		}
		return $lstEtudiant;
	}

$test = creationEtudiant(lectureFichier("../donnees/S1 FI moyennes.xlsx"));

foreach($test as $etudiant){
	echo $etudiant->getIdetudiant()."<br>";
	echo $etudiant->getCode_etu()."<br>";
	echo $etudiant->getNom()."<br>";
	echo $etudiant->getPenom()."<br>";
	echo $etudiant->getParcours()."<br>";
	echo $etudiant->getGroupeTD()."<br>";
	echo $etudiant->getGroupeTP()."<br>";
	echo $etudiant->getCursus()."<br>";
	echo $etudiant->getAnnee()."<br>";
	echo $etudiant->getAvis()."<br>";
}