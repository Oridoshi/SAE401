DROP TABLE IF EXISTS competenceModules;
DROP TABLE IF EXISTS modules;
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
    annee int,
    avis boolean,
    PRIMARY KEY (id_etu, code_etu)
);

CREATE TABLE Resultats (
    id_etu int,
    code_etu VARCHAR(10),
    id_resultat int,
    id_comp int[],
    absence int,
    moyenne float,
    PRIMARY KEY (id_etu, code_etu, id_resultat),
    FOREIGN KEY (id_etu, code_etu) REFERENCES Etudiant(id_etu, code_etu)
);

CREATE TABLE Competence (
    id_etu int,
    code_etu VARCHAR(10),
    id_comp VARCHAR(10),
    moyenne float,
    recommandation VARCHAR(10),
    PRIMARY KEY (id_etu, code_etu, id_comp),
    FOREIGN KEY (id_etu, code_etu) REFERENCES Etudiant(id_etu, code_etu)
);

CREATE TABLE Modules (
    id_etu int,
    code_etu VARCHAR(10),
    id_module VARCHAR(10),
    notes float,
    lib VARCHAR(50),
    PRIMARY KEY (id_etu, code_etu, id_module),
    FOREIGN KEY (id_etu, code_etu) REFERENCES Etudiant(id_etu, code_etu)
);

CREATE TABLE CompetenceModules (
    id_etu int,
    code_etu VARCHAR(10),
    id_comp VARCHAR(10),
    id_module VARCHAR(10),
    coef float,
    PRIMARY KEY (id_etu, code_etu, id_comp, id_module),
    FOREIGN KEY (id_etu, code_etu, id_comp) REFERENCES Competence(id_etu, code_etu, id_comp),
    FOREIGN KEY (id_etu, code_etu, id_module) REFERENCES Modules(id_etu, code_etu, id_module)

);