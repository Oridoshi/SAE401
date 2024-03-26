<?php


class Competence{
	private $id_etudiant;
	private $code_etu;
	private $id_Bin;
	private $lstRessources = array();
	private $moyenne;
	private $recommendation;

	public function __construct($id_etudiant, $code_etu, $id_bin, $lstRessources, $moyenne, $recommendation){
		$this->id_etudiant = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->id_Bin = $id_bin;
		$this->moyenne = $moyenne;
		$this->recommendation = $recommendation;
	}

	public function addComp($id){
		array_push($this->lstRessources, $id);
	}	

	public function getIdEtudiant() { return $this->id_etudiant; }

	public function getCodeEtu() { return $this->code_etu; }

	public function getIdBin() { return $this->id_Bin; }

	public function getLstRessources() { return $this->lstRessources; }

	public function getMoyenne() { return $this->moyenne; }

	public function getRecommendation() { return $this->recommendation; }


	public function setIdEtudiant($etudiant) { $this->id_etudiant = $etudiant; }

	public function setCodeEtu($code) { $this->code_etu = $code; }

	public function setIdBin($bin) { $this->id_Bin = $bin; }

	public function setLstRessources($ressources) { $this->lstRessources = $ressources; }

	public function setMoyenne($moyenne) { $this->moyenne = $moyenne; }

	public function setRecommendation($recommendation) { $this->recommendation = $recommendation; }


}