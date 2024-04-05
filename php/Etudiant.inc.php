<?php

class Etudiant {
	public int $id_etu;
	public ?string $code_etu;
	public ?string $nom;
	public ?string $prenom;
	public ?string $parcours;
	public ?string $groupe_TD;
	public ?string $groupe_TP;
	public ?string $cursus;
	public int $annee;
	public ?bool $avis;

	public function __construct(int $id_etudiant = 0, ?string $code_etu = "", ?string $nom = "", ?string $prenom = "", ?string $parcours = "", ?string $groupe_TD = "", ?string $groupe_TP = "", ?string $cursus = "", int $annee = 0, bool $avis = false) {
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

	public function getIdEtudiant() : int  { return $this->id_etu; }

	public function getCode_etu() : ?string {return $this->code_etu; }

	public function getNom() : ?string { return $this->nom; }

	public function getPrenom() : ?string { return $this->prenom; }

	public function getParcours() : ?string { return $this->parcours; }

	public function getGroupeTD() : ?string { return $this->groupe_TD; }

	public function getGroupeTP() : ?string { return $this->groupe_TP; }

	public function getCursus() : ?string { return $this->cursus; }

	public function getAnnee() : int { return $this->annee; }

	public function getAvis() : bool { return $this->avis; }

	public function setIdetudiant(int $id) { $this->id_etu = $id; }

	public function setCode_etu(?string $code) { $this->code_etu = $code; }

	public function setNom(?string $nom) { $this->nom = $nom; }

	public function setPenom(?string $prenom) { $this->prenom = $prenom; }

	public function setParcours(?string $parcours) { $this->parcours = $parcours; }

	public function setGroupeTD(?string $TD) { $this->groupe_TD = $TD; }

	public function setGroupeTP(?string $TP) { $this->groupe_TP = $TP; }

	public function setCursus(?string $cursus) { $this->cursus = $cursus; }

	public function setAnnee(int $annee) { $this->annee = $annee; }

	public function setAvis(bool $avis) { $this->avis = $avis; }

	public function __toString() {
		return $this->id_etu . " " . $this->code_etu . " " . $this->nom . " " . $this->prenom . " " . $this->parcours . " " . $this->groupe_TD . " " . $this->groupe_TP . " " . $this->cursus . " " . $this->annee . " " . $this->avis;
	}
}
