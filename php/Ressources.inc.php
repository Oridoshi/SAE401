<?php

class Ressources{
	private $id_etudiant;
	private $code_etu;
	private $id_Bin;
	private $id_ressource;
	private $notes;
	private $lib;

	public function __construct($id_etudiant, $code_etu, $id_bin, $id_ressource, $notes, $lib){
		$this->id_etudiant = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->id_Bin = $id_bin;
		$this->id_ressource = $id_ressource;
		$this->notes = $notes;
		$this->lib = $lib;
	}

	public function getIdEtudiant(){ return $this->id_etudiant; }

	public function getCodeEtu(){ return $this->code_etu; }

	public function getIdBin(){ return $this->id_Bin; }

	public function getIdRessource(){ return $this->id_ressource; }

	public function getNotes(){ return $this->notes; }

	public function getLib(){ return $this->lib; }

	public function setIdEtudiant($etudiant){ $this->id_etudiant = $etudiant; }

	public function setCodeEtu($etu){ $this->code_etu = $etu; }

	public function setIdBin($bin){ $this->id_Bin = $bin; }

	public function setIdRessource($ressource){ $this->id_ressource = $ressource; }

	public function setNotes($notes){ $this->notes = $notes; }

	public function setLib($lib){ $this->lib = $lib; }
}