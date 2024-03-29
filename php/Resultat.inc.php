<?php


class Resultat{
	private $id_etu;
	private $code_etu;
	private $id_resultat;
	private $id_comp;
	private $absence;
	private $rang;
	private $moyenne;
	private $alternant;

	public function __construct($id_etudiant, $code_etu, $id_resultat, $id_comp, $rang, $absence, $moyenne, $alternant){
		$this->id_etu = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->id_resultat = $id_resultat;
		$this->id_comp = $id_comp;
		$this->rang = $rang;
		$this->absence = $absence;
		$this->moyenne = $moyenne;
		$this->alternant = $alternant;
	}

	public function addComp($id){
		array_push($this->id_comp, $id);
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
