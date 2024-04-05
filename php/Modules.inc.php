<?php

class Modules {
	private $id_etu;
	private $code_etu;
	private $notes;
	private $libelle;

	public function __construct($id_etudiant=0, $code_etu=0, $notes=0.0, $libelle=""){
		$this->id_etu = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->notes = $notes;
		$this->libelle = $libelle;
	}

	public function getIdEtudiant(){ return $this->id_etu; }

	public function getCodeEtu(){ return $this->code_etu; }

	public function getNotes(){ return $this->notes; }

	public function getLibelle(){ return $this->libelle; }

	public function setIdEtudiant($etudiant){ $this->id_etu = $etudiant; }

	public function setCodeEtu($etu){ $this->code_etu = $etu; }

	public function setNotes($notes){ $this->notes = $notes; }

	public function setLibelle($libelle){ $this->libelle = $libelle; }
}