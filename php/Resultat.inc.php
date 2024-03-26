<?php


class Resultat{
	private $id_etudiant;
	private $code_etu;
	private $id_resultat;
	private $id_comp = array();

	public function __construct($id_etudiant, $code_etu, $id_resultat){
		$this->id_etudiant = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->id_resultat = $id_resultat;
	}

	public function addComp($id){
		array_push($this->id_comp, $id);
	}

	public function getIdEtudiant(){ return $this->id_etudiant; }

	public function getCodeEtu(){ return $this->code_etu; }

	public function getIdResultat(){ return $this->id_resultat; }

	public function getIdComp(){ return $this->id_comp; }

	public function setIdEtudiant($etudiant){ $this->id_etudiant = $etudiant; }

	public function setCodeEtu($code){ $this->code_etu = $code; }

	public function setIdResultat($resultat){ $this->id_resultat = $resultat; }

	public function setIdComp($comp){ $this->id_comp = $comp; }
}
