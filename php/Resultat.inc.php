<?php


class Resultat{
	public $id_etu;
	public $code_etu;
	public $id_resultat;
	public $id_comp;
	public $absence;
	public $rang;
	public $moyenne;
	public $alternant;

	public function __construct($id_etudiant = 0, $code_etu = "", $id_resultat = 0, $id_comp = 0, $rang = 0, $moyenne = 0, $absence = 0, $alternant = ""){
		$this->id_etu = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->id_resultat = $id_resultat;
		$this->id_comp = $id_comp;
		$this->rang = $rang;
		$this->absence = $absence;
		$this->moyenne = $moyenne;
		$this->alternant = $alternant;
	}

	public function getIdEtudiant(){ return $this->id_etu; }

	public function getCodeEtu(){ return $this->code_etu; }

	public function getIdResultat(){ return $this->id_resultat; }

	public function getIdComp(){ return $this->id_comp; }

	public function getRang(){ return $this->rang; }

	public function getAbsence(){ return $this->absence; }

	public function getMoyenne(){ return $this->moyenne; }

	public function getAlternant(){ return $this->alternant; }

	public function setIdEtudiant($etudiant){ $this->id_etu = $etudiant; }

	public function setCodeEtu($code){ $this->code_etu = $code; }

	public function setIdResultat($resultat){ $this->id_resultat = $resultat; }

	public function setIdComp($comp){ $this->id_comp = $comp; }

	public function setRang($rang){ $this->rang = $rang; }

	public function setAbsence($absence){ $this->absence = $absence; }

	public function setMoyenne($moyenne){ $this->moyenne = $moyenne; }

	public function setAlternant($alternant){ $this->alternant = $alternant; }
}
