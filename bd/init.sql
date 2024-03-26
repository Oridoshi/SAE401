DROP TABLE IF EXISTS ressources;
DROP TABLE IF EXISTS competence;
DROP TABLE IF EXISTS Resultats;
DROP TABLE IF EXISTS Etudiant;

CREATE TABLE Etudiant (
    id_etudiant int,
    code_etu VARCHAR(10),
    nom VARCHAR(30),
    prenom VARCHAR(30),
    parcours VARCHAR(20),
    rang int,
    groupe_TD VARCHAR(2),
    groupe_TP VARCHAR(2),
    cursus VARCHAR(20),
    absence int,
    annee int,
    avis boolean,
    PRIMARY KEY (id_etudiant, code_etu)
);

CREATE TABLE Resultats (
    id_etudiant int,
    code_etu VARCHAR(10),
    id_resultat int,
    id_comp int[],
    PRIMARY KEY (id_etudiant, code_etu, id_resultat),
    FOREIGN KEY (id_etudiant, code_etu) REFERENCES Etudiant(id_etudiant, code_etu)
);

CREATE TABLE Competence (
    id_etudiant int,
    code_etu VARCHAR(10),
    id_Bin VARCHAR(10),
    lstRessources int[],
    moyenne float,
    recommandation VARCHAR(10),
    PRIMARY KEY (id_etudiant, code_etu, id_Bin),
    FOREIGN KEY (id_etudiant, code_etu) REFERENCES Etudiant(id_etudiant, code_etu)
);

CREATE TABLE Ressources (
    id_etudiant int,
    code_etu VARCHAR(10),
    id_Bin VARCHAR(10),
    id_ressource int,
    notes float,
    lib VARCHAR(50),
    PRIMARY KEY (id_etudiant, code_etu, id_Bin, id_ressource),
    FOREIGN KEY (id_etudiant, code_etu) REFERENCES Etudiant(id_etudiant, code_etu),
    FOREIGN KEY (id_etudiant, code_etu, id_Bin) REFERENCES Competence(id_etudiant, code_etu, id_Bin)
);
