<?php


class Competence{
	private $id_etu;
	private $code_etu;
	private $id_comp;
	private $moyenne;
	private $recommendation;
	private $rang;

	public function __construct($id_etudiant=0, $code_etu=0, $id_comp=0, $moyenne=0.0, $recommendation="", $rang=0){
		$this->id_etu = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->id_comp = $id_comp;
		$this->moyenne = $moyenne;
		$this->recommendation = $recommendation;
		$this->rang = $rang;
	}

	public function getIdEtu() { return $this->id_etu; }

	public function getCodeEtu() { return $this->code_etu; }

	public function getIdComp() { return $this->id_comp; }

	public function getMoyenne() { return $this->moyenne; }

	public function getRecommendation() { return $this->recommendation; }

	public function getRang() { return $this->rang; }

	public function setIdEtudiant($etudiant) { $this->id_etu = $etudiant; }

	public function setCodeEtu($code) { $this->code_etu = $code; }

	public function setIdComp($id) { $this->id_comp = $id; }

	public function setMoyenne($moyenne) { $this->moyenne = $moyenne; }

	public function setRecommendation($recommendation) { $this->recommendation = $recommendation; }

	public function setRang($rang) { $this->rang = $rang; }
}