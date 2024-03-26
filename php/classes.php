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
}

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
}

class Competence{
	private $id_etudiant;
	private $code_etu;
	private $id_Bin;
	private $lstRessources = array();
	private $moyenne;
	private $recommendation;

	public function __construct($id_etudiant, $code_etu, $id_bin, $lstRessources, $moyenne, $recommendation){
		$this->id_etudiant = $id_etudiant;
		$this->code_etu = $code_etu;
		$this->id_Bin = $id_bin;
		$this->moyenne = $moyenne;
		$this->recommendation = $recommendation;
	}

	public function addComp($id){
		array_push($this->lstRessources, $id);
	}	
}

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
}