<?php


class Competence{
	private $id_etu;
	private $code_etu;
	private $id_comp;
	private $moyenne;
	private $recommendation;

	public function __construct($id_etudiant, $code_etu, $id_comp, $moyenne, $recommendation){
		$this->id_etudiant = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->id_comp = $id_comp;
		$this->moyenne = $moyenne;
		$this->recommendation = $recommendation;
	}

	public function getIdEtudiant() { return $this->id_etu; }

	public function getCodeEtu() { return $this->code_etu; }

	public function getIdComp() { return $this->id_comp; }

	public function getMoyenne() { return $this->moyenne; }

	public function getRecommendation() { return $this->recommendation; }


	public function setIdEtudiant($etudiant) { $this->id_etu = $etudiant; }

	public function setCodeEtu($code) { $this->code_etu = $code; }

	public function setIdComp($bin) { $this->id_Bin = $bin; }

	public function setMoyenne($moyenne) { $this->moyenne = $moyenne; }

	public function setRecommendation($recommendation) { $this->recommendation = $recommendation; }


}