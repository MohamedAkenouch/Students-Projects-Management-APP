<?php

class Sujet{
    $nom_sujet,$domaine,$filiere,$niveau,$descrip_tion,$nbrOffre;
    function __construct($nom_sujet,$domaine,$filiere,$niveau,$descrip_tion,$nbrOffre) {
        $this->nom_sujet = $nom_sujet;
        $this->domaine = $domaine;
        $this->filiere = $filiere;
        $this->niveau = $niveau;
        $this->descrip_tion = $descrip_tion;
        $this->nbrOffre = $nbrOffre;
    }
    
    function AjouterSujet($id){
        $stmt = mysqli_prepare($link, "INSERT INTO sujet (titre, domaine, filiere, niveau, descrip_tion, nbrOffre, idEnseignant) VALUES (?, ?, ?, ?, ?, ?, ?);");
        mysqli_stmt_bind_param($stmt, 'sssisii', $this->nom_sujet, $this->domaine, $this->filiere ,$this->niveau ,$this->descrip_tion ,$this->nbrOffre , $id);
        mysqli_stmt_execute($stmt);
    }
}

?>