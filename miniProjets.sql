CREATE TABLE Enseignant (
    idEnseignant int NOT NULL AUTO_INCREMENT,
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    tel varchar(11) NOT NULL,
    parcours text,
    PRIMARY KEY (idEnseignant)
);



CREATE TABLE Sujet (
    idSujet int NOT NULL AUTO_INCREMENT,
    idEnseignant int ,
    titre varchar(50) NOT NULL,
    niveau int NOT NULL,
    filiere varchar(30) NOT NULL,
    domaine varchar(100) NOT NULL,
    descrip_tion text not NULL,
    nbrOffre int NOT NULL,
    PRIMARY KEY (idSujet),
    FOREIGN KEY (idEnseignant) REFERENCES Enseignant(idEnseignant)
);


CREATE TABLE Etudiant (
    idEtudiant int NOT NULL AUTO_INCREMENT,
    idEnseignant int ,
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    tel varchar(11) NOT NULL,
    niveau int NOT NULL,
    filiere varchar(30) NOT NULL,
    competences text ,
    motivations text ,
    projetsrealises text ,
    PRIMARY KEY (idEtudiant),
    FOREIGN KEY (idEnseignant) REFERENCES Enseignant(idEnseignant)
);

CREATE TABLE candidature (
    idEtudiant int NOT NULL ,
    idsujet int NOT NULL ,
    etat ENUM ('En attente' , 'En traitement' , 'Validée' , 'refusée') DEFAULT 'En attente',
    priorité int DEFAULT 0,
    
    FOREIGN KEY (idEtudiant) REFERENCES Etudiant(idEtudiant),
    FOREIGN KEY (idSujet) REFERENCES Sujet(idSujet)

);







