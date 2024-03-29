<?php

class Modules {
	private $id_etu;
	private $code_etu;
	private $id_module;
	private $notes;
	private $libelle;

	public function __construct($id_etudiant, $code_etu, $id_module, $notes, $libelle){
		$this->id_etu = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->id_module = $id_module;
		$this->notes = $notes;
		$this->libelle = $libelle;
	}

	public function getIdEtudiant(){ return $this->id_etu; }

	public function getCodeEtu(){ return $this->code_etu; }

	public function getIdModule(){ return $this->id_module; }

	public function getNotes(){ return $this->notes; }

	public function getLibelle(){ return $this->libelle; }

	public function setIdEtudiant($etudiant){ $this->id_etu = $etudiant; }

	public function setCodeEtu($etu){ $this->code_etu = $etu; }

	public function setIdModule($module){ $this->id_module = $module; }

	public function setNotes($notes){ $this->notes = $notes; }

	public function setLibelle($libelle){ $this->libelle = $libelle; }
}