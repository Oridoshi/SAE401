DROP TABLE IF EXISTS etudiant;
DROP TABLE IF EXISTS resultats;
DROP TABLE IF EXISTS competence;
DROP TABLE IF EXISTS ressources;

CREATE TABLE etudiant (
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
    PRIMARY KEY (id_etudiant, code_etu)
);

CREATE TABLE resultats (
    id_etudiant int,
    code_etu VARCHAR(10),
    id_resultat int,
    id_comp int[],
    PRIMARY KEY (id_etudiant, code_etu, id_resultat),
    FOREIGN KEY (id_etudiant, code_etu) REFERENCES etudiant(id_etudiant, code_etu)
);

CREATE TABLE competence (
    id_etudiant int,
    code_etu VARCHAR(10),
    idBin VARCHAR(10),
    lstRessources int[],
    moyenne float,
    recommandation VARCHAR(10),
    PRIMARY KEY (id_etudiant, code_etu, idBin),
    FOREIGN KEY (id_etudiant, code_etu) REFERENCES etudiant(id_etudiant, code_etu)
);

CREATE TABLE ressources (
    id_etudiant int,
    code_etu VARCHAR(10),
    id_bin VARCHAR(10),
    id_ressource int,
    notes float,
    lib VARCHAR(50),
    PRIMARY KEY (id_etudiant, code_etu, id_bin, id_ressource),
    FOREIGN KEY (id_etudiant, code_etu) REFERENCES etudiant(id_etudiant, code_etu),
    FOREIGN KEY (id_etudiant, code_etu, id_bin) REFERENCES competence(id_etudiant, code_etu, idBin)
);
