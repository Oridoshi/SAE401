<?php

//include
include_once 'Etudiant.inc.php';
include_once 'Resultat.inc.php';
include_once 'Competence.inc.php';
include_once 'Modules.inc.php';
include_once 'CompetenceModule.inc.php';

class DB{
	private static $instance = null;

	private $pdo = null;

	public function __construct(){
		$connStr = 'pgsql:host=woody port=5432 dbname=hb220678';

		try{
			$this->pdo = new PDO($connStr, 'hb220678', 'postgre');

			$this->pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}catch(PDOException $e){
			echo "probleme de connexion : ".$e->getMessage();       
		}
	}

	public static function getInstance(){
		if (is_null(self::$instance)) {
			try {
				self::$instance = new DB();
			}
			catch (PDOException $e) {
				echo $e;
			}
		} 

		$obj = self::$instance;

		if (($obj->pdo) == null) {
			self::$instance=null;
		}
		return self::$instance;
	}

	public function close() {
		$this->pdo = null;
	}

	public function execQuery($requete, $tparam, $nomClasse){
		//préparation de la requête
		$stmt = $this->pdo->prepare($requete);
		//on indique que l'on va récupére les tuples sous forme d'objets instance de Client
		$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $nomClasse);
		//on exécute la requête
		if ($tparam != null) {
			$stmt->execute($tparam);
		}
		else {
			$stmt->execute();
		}
		//récupération du résultat de la requête sous forme d'un tableau d'objets
		$tab = array();
		$tuple = $stmt->fetch(); //on récupère le premier tuple sous forme d'objet
		if ($tuple) {
			//au moins un tuple a été renvoyé
			while ($tuple != false) {
				$tab[]=$tuple; //on ajoute l'objet en fin de tableau
				$tuple = $stmt->fetch(); //on récupère un tuple sous la forme
				//d'un objet instance de la classe $nomClasse
			} //fin du while
		}
		return $tab;
	}

	public function execMaj($requete, $tparam) {
		//préparation de la requête
		$stmt = $this->pdo->prepare($requete);
		//on exécute la requête
		if ($tparam != null) {
			$stmt->execute($tparam);
		}
		else {
			$stmt->execute();
		}

		return $stmt->rowCount();
	}

	public function selectEtudiants(){
		$query = "SELECT * FROM Etudiant;";
		return $this->execQuery($query, NULL, "Etudiant");
	}

	public function selectEtudiant($id_etu){
		$query = "SELECT * FROM Etudiant WHERE id_etu = ?;";
		$tparam = array($id_etu);
		return $this->execQuery($query, $tparam, "Etudiant");
	}

	public function selectMoyEtu($etudiants, $annee, $competence){
        $requete = "Select SUM(moyenne) from Competence where id_etu = ? AND code_etu = ? AND (id_comp = ? OR id_comp = ?);";

		$etudiant  = $etudiants[0];
        $semestre1 = null; 
        $semestre2 = null;

        switch ($annee)
        {
            case 1: $semestre1 = 1; $semestre2 = 2; break;
            case 2: $semestre1 = 3; $semestre2 = 4; break;
            case 3: $semestre1 = 5; $semestre2 = 6; break;
        }

        $tparam = array($etudiant->getIdEtudiant(), $etudiant->getCode_etu(), "BIN".$semestre1.$competence, "BIN".$semestre2.$competence);
        $this->execMaj($requete, $tparam);
    }

	public function selectResultats() {
		$query = "SELECT * FROM Resultat;";
		return $this->execQuery($query, NULL, "Resultat");
	}

	public function selectCompetences() {
		$query = "SELECT * FROM Competence;";
		return $this->execQuery($query, NULL, "Competence");
	}

	public function selectModules() {
		$query = "SELECT * FROM Module;";
		return $this->execQuery($query, NULL, "Module");
	}

	public function selectCompetenceModule() {
		$query = "SELECT * FROM CompetenceModule;";
		return $this->execQuery($query, NULL, "CompetenceModule");
	}

	public function getBado($groupe_TD){
		$query = "SELECT * FROM Etudiant WHERE groupe_TD = ?;";
		return $this->execQuery($query, $groupe_TD, "Etudiant");
	}

	public function getAnnees() {
		$query = "SELECT DISTINCT annee FROM Etudiant;";
		$stmt = $this->pdo->prepare($query);

		$stmt->execute();
		
		$resultats = $stmt->fetchAll(PDO::FETCH_OBJ);

		$annees = array();
		foreach ($resultats as $resultat) {
			$annees[] = $resultat->annee;
		}
		return $annees;
	}


	//Requete pour insertion des données

	/**
	 * Insère des données d'étudiants dans la base de données.
	 *
	 * @param array $etudiants Un tableau d'objets représentant des étudiants.
	 * Chaque objet doit avoir les attributs suivants :
	 * - id_etudiant : L'identifiant de l'étudiant.
	 * - code_etu : Le code de l'étudiant.
	 * - nom : Le nom de l'étudiant.
	 * - prenom : Le prénom de l'étudiant.
	 * - parcours : Le parcours de l'étudiant.
	 * - groupe_TD : Le groupe de travaux dirigés de l'étudiant.
	 * - groupe_TP : Le groupe de travaux pratiques de l'étudiant.
	 * - cursus : Le cursus de l'étudiant.
	 * - annee : L'année d'études de l'étudiant.
	 * - avis : L'avis sur l'étudiant.
	 */
	public function insertEtudiant($etudiants)
	{
		$requete = "INSERT INTO Etudiant VALUES (?,?,?,?,?,?,?,?,?)";

		foreach($etudiants as $etudiant) {
			$tparam = array($etudiant->getIdEtudiant(), $etudiant->getCode_etu(), $etudiant->getNom(), $etudiant->getPrenom(), $etudiant->getParcours(), $etudiant->getGroupeTD(), $etudiant->getGroupeTP(), $etudiant->getCursus(), 1976);
			$this->execMaj($requete, $tparam);
		}
	}

	/**
	 * Insère des résultats dans la base de données.
	 *
	 * @param array $resultats Un tableau d'objets représentant des résultats.
	 * Chaque objet doit avoir les attributs suivants :
	 * - id_etudiant : L'identifiant de l'étudiant.
	 * - code_etu : Le code de l'étudiant.
	 * - id_resultat : L'identifiant du résultat.
	 * - rang : Le rang du résultat.
	 * - absence : Le nombre d'absences.
	 * - moyenne : La moyenne.
	 * - alternant : Un indicateur indiquant si l'étudiant est en alternance.
	 */
	public function insertResultat($resultats) {
		$requete = "INSERT INTO Resultats VALUES (?,?,?,?,?,?,?)";

		foreach($resultats as $resultat) {
			$tparam = array($resultat->getIdEtudiant(), $resultat->getCodeEtu(), $resultat->getIdResultat(), '{' . implode(',', $resultat->getIdComp()) . '}', $resultat->getAbsence(), $resultat->getRang(), $resultat->getMoyenne());
			$this->execMaj($requete, $tparam);
		}
	}

	/**
	 * Insère des compétences dans la base de données.
	 *
	 * @param array $competences Un tableau d'objets représentant des compétences.
	 * Chaque objet doit avoir les attributs suivants :
	 * - id_etudiant : L'identifiant de l'étudiant.
	 * - code_etu : Le code de l'étudiant.
	 * - id_comp : L'identifiant de la compétence.
	 * - moyenne : La moyenne de la compétence.
	 * - recommendation : La recommandation.
	 * - rang : Le rang de la compétence.
	 */
	public function insertCompetence($competences) {
		$requete = "INSERT INTO Competence VALUES (?,?,?,?,?,?)";

		foreach($competences as $competence) {
			$tparam = array($competence->getIdEtu(), $competence->getCodeEtu(), $competence->getIdComp(), $competence->getMoyenne(), $competence->getRang(), $competence->getRecommendation());
			$this->execMaj($requete, $tparam);
		}
	}

	/**
	 * Insère des modules dans la base de données.
	 *
	 * @param array $modules Un tableau d'objets représentant des modules.
	 * Chaque objet doit avoir les attributs suivants :
	 * - id_etudiant : L'identifiant de l'étudiant.
	 * - code_etu : Le code de l'étudiant.
	 * - id_comp : L'identifiant de la compétence associée au module.
	 * - id_module : L'identifiant du module.
	 * - notes : Les notes du module.
	 * - libelle : Le libellé du module.
	 */
	public function insertModule($modules) {
		$requete = "INSERT INTO Modules VALUES (?,?,?,?)";

		foreach($modules as $module) {
			$tparam = array($module->getIdEtudiant(), $module->getCodeEtu(), $module->getNotes(), $module->getLibelle());
			$this->execMaj($requete, $tparam);
		}
	}

    /**
     * Insère des compétences de modules dans la base de données.
     *
     * @param array $competenceModules Un tableau d'objets représentant des compétences de modules.
     * Chaque objet doit avoir les attributs suivants :
     * - id_etudiant : L'identifiant de l'étudiant.
     * - code_etu : Le code de l'étudiant.
     * - id_comp : L'identifiant de la compétence associée au module.
     * - id_module : L'identifiant du module.
     * - coef : Le coefficient de la compétence de module.
     */
    public function insertCompetenceModule($competenceModules) {
        $requete = "INSERT INTO CompetenceModules VALUES (?,?,?)";

        foreach($competenceModules as $competenceModule) {
            $tparam = array($competenceModule->getIdComp(), $competenceModule->getIdModule(), $competenceModule->getCoef());
            $this->execMaj($requete, $tparam);
        }
    }
}