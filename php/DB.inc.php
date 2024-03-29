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

    
}