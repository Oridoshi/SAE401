DROP TABLE IF EXISTS ressources;
DROP TABLE IF EXISTS competence;
DROP TABLE IF EXISTS Resultats;
DROP TABLE IF EXISTS Etudiant;

CREATE TABLE Etudiant (
    id_etu int,
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
    PRIMARY KEY (id_etu, code_etu)
);

CREATE TABLE Resultats (
    id_etu int,
    code_etu VARCHAR(10),
    id_resultat int,
    id_comp int[],
    PRIMARY KEY (id_etu, code_etu, id_resultat),
    FOREIGN KEY (id_etu, code_etu) REFERENCES Etudiant(id_etu, code_etu)
);

CREATE TABLE Competence (
    id_etu int,
    code_etu VARCHAR(10),
    id_bin VARCHAR(10),
    lstRessources int[],
    moyenne float,
    recommandation VARCHAR(10),
    PRIMARY KEY (id_etu, code_etu, id_bin),
    FOREIGN KEY (id_etu, code_etu) REFERENCES Etudiant(id_etu, code_etu)
);

CREATE TABLE Ressources (
    id_etu int,
    code_etu VARCHAR(10),
    id_bin VARCHAR(10),
    id_ressource int,
    notes float,
    lib VARCHAR(50),
    PRIMARY KEY (id_etu, code_etu, id_bin, id_ressource),
    FOREIGN KEY (id_etu, code_etu) REFERENCES Etudiant(id_etu, code_etu),
    FOREIGN KEY (id_etu, code_etu, id_bin) REFERENCES Competence(id_etu, code_etu, id_bin)
);
