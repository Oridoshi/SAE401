<?php

class Etudiant {
	private $id_etudiant;
	private $code_etu;
	private $nom;
	private $prenom;
	private $parcours;
	private $rang;
	private $groupe_TD;
	private $groupe_TP;
	private $cursus;
	private $absence;
	private $annee;

	public function __construct($id_etudiant, $code_etu, $nom, $prenom, $parcours, $rang, $groupe_TD, $groupe_TP, $cursus, $absence, $annee) {
		$this->id_etudiant = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->parcours = $parcours;
		$this->rang = $rang;
		$this->groupe_TD = $groupe_TD;
		$this->groupe_TP = $groupe_TP;
		$this->cursus = $cursus;
		$this->absence = $absence;
		$this->annee = $annee;
	}

	public function getIdetudiant() { return $this->id_etudiant; }

	public function getCode_etu() {return $this->code_etu; }

	public function getNom() { return $this->nom; }

	public function getPenom() { return $this->prenom; }

	public function getParcours() { return $this->parcours; }

	public function getRang() { return $this->rang; }

	public function getGroupe_TD() { return $this->groupe_TD; }

	public function getGroupeTP() { return $this->groupe_TP; }

	public function getCursus() { return $this->cursus; }

	public function getAbsence() { return $this->absence; }

	public function getAnnee() { return $this->annee; }

	public function setIdetudiant($id) { $this->id_etudiant = $id; }

	public function setCode_etu($code) { $this->code_etu = $code; }

	public function setNom($nom) { $this->nom = $nom; }

	public function setPenom($prenom) { $this->prenom = $prenom; }

	public function setParcours($parcours) { $this->parcours = $parcours; }

	public function setRang($rang) { $this->rang = $rang; }

	public function setGroupe_TD($TD) { $this->groupe_TD = $TD; }

	public function setGroupeTP($TP) { $this->groupe_TP = $TP; }

	public function setCursus($cursus) { $this->cursus = $cursus; }

	public function setAbsence($absence) { $this->absence = $absence; }

	public function setAnnee($annee) { $this->annee = $annee; }
}
