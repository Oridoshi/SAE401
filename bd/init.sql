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
    groupe_TD VARCHAR(2),
    groupe_TP VARCHAR(2),
    cursus VARCHAR(30),
    annee int,
    avis boolean default false,
    PRIMARY KEY (id_etu, code_etu)
);

CREATE TABLE Resultats (
    id_etu int,
    code_etu VARCHAR(10),
    id_resultat int,
    id_comp VARCHAR(10)[],
    absence int,
    rang int,
    moyenne float,
    alternant boolean default false,
    PRIMARY KEY (id_etu, code_etu, id_resultat),
    FOREIGN KEY (id_etu, code_etu) REFERENCES Etudiant(id_etu, code_etu)
);

CREATE TABLE Competence (
    id_etu int,
    code_etu VARCHAR(10),
    id_comp VARCHAR(10),
    moyenne float,
    rang int,
    recommandation VARCHAR(10),
    PRIMARY KEY (id_etu, code_etu, id_comp),
    FOREIGN KEY (id_etu, code_etu) REFERENCES Etudiant(id_etu, code_etu)
);

CREATE TABLE Modules (
    id_etu int,
    code_etu VARCHAR(10),
    notes float,
    lib VARCHAR(50),
    PRIMARY KEY (id_etu, code_etu, lib),
    FOREIGN KEY (id_etu, code_etu) REFERENCES Etudiant(id_etu, code_etu)
);

CREATE TABLE CompetenceModules (
    id_etu int,
    code_etu VARCHAR(10),
    id_comp VARCHAR(10),
    lib VARCHAR(50),
    coef float,
    PRIMARY KEY (id_etu, code_etu, id_comp, lib),
    FOREIGN KEY (id_etu, code_etu, id_comp) REFERENCES Competence(id_etu, code_etu, id_comp),
    FOREIGN KEY (id_etu, code_etu, lib) REFERENCES Modules(id_etu, code_etu, lib)

);