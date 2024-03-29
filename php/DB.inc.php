<?php

//include

class DB{
    private static $instance = null;

    private $pdo = null;

    public function __construct(){
        $connStr = 'pgsql:host=127.0.0.1 port=5432 dbname=hugo';

        try{
            $this->pdo = new PDO($connStr, 'hugo', 'hugo');

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

    public function execQuery($requete, $tparam, $nomClasse) {
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

    public function selectEtudiants() {
        $query = "SELECT * FROM Etudiant;";
        return $this->execQuery($query, NULL, "Etudiant");
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

    public function insertEtudiant($id_etudiant, $code_etu, $nom, $prenom, $parcours, $rang, $groupe_TD, $groupe_TP, $cursus, $annee, $avis) {
        $requete = "INSERT INTO Etudiant VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $tparam = array($id_etudiant, $code_etu, $nom, $prenom, $parcours, $rang, $groupe_TD, $groupe_TP, $cursus, $annee, $avis);
        return $this->execMaj($requete, $tparam);
    }

    public function insertResultat($id_etudiant, $code_etu, $id_resultat, $rang, $absence, $moyenne, $alternant) {
        $requete = "INSERT INTO Resultat VALUES (?,?,?,?,?,?,?)";
        $tparam = array($id_etudiant, $code_etu, $id_resultat, $rang, $absence, $moyenne, $alternant);
        return $this->execMaj($requete, $tparam);
    }

    public function insertCompetence($id_etudiant, $code_etu, $id_comp, $moyenne, $recommendation, $rang) {
        $requete = "INSERT INTO Competence VALUES (?,?,?,?,?,?)";
        $tparam = array($id_etudiant, $code_etu, $id_comp, $moyenne, $recommendation, $rang);
        return $this->execMaj($requete, $tparam);
    }

    public function insertModule($id_etudiant, $code_etu, $id_comp, $id_module, $notes, $libelle) {
        $requete = "INSERT INTO Module VALUES (?,?,?,?,?,?)";
        $tparam = array($id_etudiant, $code_etu, $id_comp, $id_module, $notes, $libelle);
        return $this->execMaj($requete, $tparam);
    }

    public function insertCompetenceModule($id_etu, $code_etu, $id_comp, $id_module, $coef) {
        $requete = "INSERT INTO CompetenceModule VALUES (?,?,?,?,?)";
        $tparam = array($id_etu, $code_etu, $id_comp, $id_module, $coef);
        return $this->execMaj($requete, $tparam);
    }
}