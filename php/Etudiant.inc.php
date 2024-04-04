<?php

class Etudiant {
	private $id_etu;
	private $code_etu;
	private $nom;
	private $prenom;
	private $parcours;
	private $groupe_TD;
	private $groupe_TP;
	private $cursus;
	private $annee;
	private $avis;

	public function __construct($id_etudiant, $code_etu, $nom, $prenom, $parcours, $groupe_TD, $groupe_TP, $cursus, $annee, $avis) {
		$this->id_etu = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->parcours = $parcours;
		$this->groupe_TD = $groupe_TD;
		$this->groupe_TP = $groupe_TP;
		$this->cursus = $cursus;
		$this->annee = $annee;
		$this->avis = $avis;
	}

	public function getIdEtudiant() { return $this->id_etu; }

	public function getCode_etu() {return $this->code_etu; }

	public function getNom() { return $this->nom; }

	public function getPrenom() { return $this->prenom; }

	public function getParcours() { return $this->parcours; }

	public function getGroupeTD() { return $this->groupe_TD; }

	public function getGroupeTP() { return $this->groupe_TP; }

	public function getCursus() { return $this->cursus; }

	public function getAnnee() { return $this->annee; }

	public function getAvis() { return $this->avis; }

	public function setIdetudiant($id) { $this->id_etu = $id; }

	public function setCode_etu($code) { $this->code_etu = $code; }

	public function setNom($nom) { $this->nom = $nom; }

	public function setPenom($prenom) { $this->prenom = $prenom; }

	public function setParcours($parcours) { $this->parcours = $parcours; }

	public function setGroupeTD($TD) { $this->groupe_TD = $TD; }

	public function setGroupeTP($TP) { $this->groupe_TP = $TP; }

	public function setCursus($cursus) { $this->cursus = $cursus; }

	public function setAnnee($annee) { $this->annee = $annee; }
}
